<?php

namespace App\Controller;

use App\Model\AnswerModel;
use App\Model\PollModel;
use App\Model\QuestionModel;
use Core\Controller\Controller;
use Core\Model\Converters\TypeConverter;
use Core\Tools\Cleaner;
use Core\Validator\ArrayValidator;
use DateTime;


class PollController extends Controller {

    public function pollListPage () {
        $pollModel = new PollModel();
        $polls = $pollModel->find();
        $this->render("pollListView", compact("polls"));
    } 

    public function createPollPage () {
        $this->render("createPollView");
    }

    public function confirmCreatePollPage () {
        $this->render("confirmView", ["message" => "Le sondage a correctement été crée !"]);
    }

    public function createPoll() {
        //TEMP
        $user_id = 0;
      
        $this->checkPostKeys($_POST, ["poll_name", "poll_description", "poll_questions", "poll_responses"]);

        if(count($_POST["poll_responses"]) !== count($_POST["poll_questions"])) {
            throw new \Exception("It must have poll questions as much as poll responses group");
        }

        $pollQuestionsValidation = new ArrayValidator($_POST["poll_questions"]);
        $pollQuestionsValidation->noEmptyValue();
        
        $pollResponseValidation = new ArrayValidator($_POST["poll_responses"]);
        $pollResponseValidation->noEmptyValue();

        if($pollQuestionsValidation->getErrors() || $pollResponseValidation->getErrors()) {
            throw new \Exception("Some questions or answers are empty");
        }

        $date = TypeConverter::stringifyDate(new DateTime());
        $pollName = Cleaner::cleanHtml($_POST["poll_name"]);
        $pollDescription = Cleaner::cleanHtml($_POST['poll_description']);

        
        $pollQuestions = Cleaner::cleanArray( $pollQuestionsValidation->getValues() );
        $pollResponses = Cleaner::cleanArray( array_values($pollResponseValidation->getValues()) );

    
        $pollModel = new PollModel();
        $pollId = $pollModel->insert($pollName, $pollDescription, $date, $user_id);

        if($pollId) {

            $questionModel = new QuestionModel();
            $answerModel = new AnswerModel();

            foreach($pollQuestions as $k=>$question) {

                $qId = $questionModel->insert($pollId, htmlspecialchars( $question ));

                if($qId) {
                    
                    
                  $answerModel->insertMany($pollResponses[$k],$qId);

                }
                else 
                {
                    throw new \Exception("The question hasn't been created"); 
                }
                
            }
            $this->redirect(MAIN_PATH . "poll/created");
        } 
        else {
            throw new \Exception("The poll hasn't been created");
        }

    }

}