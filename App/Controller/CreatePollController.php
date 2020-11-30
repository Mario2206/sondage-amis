<?php

namespace App\Controller;

use App\Model\AnswerModel;
use App\Model\PollModel;
use App\Model\QuestionModel;
use Core\Controller\Controller;
use Core\Model\Converters\TypeConverter;
use Core\Tools\Cleaner;
use Core\Tools\Session;
use Core\Validator\ArrayValidator;
use DateTime;


class CreatePollController extends Controller {
    private $user;

    public function __construct()
    {
        $this->user = Session::get("user");
        $this->protectPageFor("user", "/login");
    }

    public function pollListPage () {
        $pollModel = new PollModel();
        $polls = $pollModel->find(["idUser"=>$this->user->idUser]);
        $currentDate = date(TypeConverter::DATE_FORMAT);
        $this->render("pollListView", compact("polls", "currentDate"));
    } 

    public function createPollPage () {
        $this->render("createPollView");
    }

    public function confirmCreatePollPage () {
        $this->render("confirmView", ["message" => "Le sondage a correctement été crée !"]);
    }

    public function createPoll() {
        
        $user = Session::get("user");
      
        $this->checkPostKeys($_POST, ["poll_name", "poll_description", "poll_questions", "poll_responses", "poll_available", "poll_unavailable"]);

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
        $pollAvailableDate = $_POST["poll_available"];
        $pollUnAvailableDate = $_POST["poll_unavailable"];

        
        $pollQuestions = Cleaner::cleanArray( $pollQuestionsValidation->getValues() );
        $pollResponses = Cleaner::cleanArray( array_values($pollResponseValidation->getValues()) );

    
        $pollModel = new PollModel();
        $pollId = $pollModel->insert($pollName, $pollDescription, $date, $user->idUser, $pollAvailableDate, $pollUnAvailableDate);

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
            $this->redirect(\POLL_CREATED);
        } 
        else {
            throw new \Exception("The poll hasn't been created");
        }

    }

}