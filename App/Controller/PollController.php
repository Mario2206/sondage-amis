<?php

namespace App\Controller;

use App\Model\AnswerModel;
use App\Model\PollModel;
use App\Model\QuestionModel;
use Core\Controller\Controller;
use Core\Model\Converters\TypeConverter;
use Core\View\Template\Template;
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

        $this->checkPostKeys($_POST, ["poll_name", "poll_description", "poll_questions", "poll_responses"]);

        if(count($_POST["poll_responses"]) !== count($_POST["poll_questions"])) {
            throw new \Exception("It must have poll questions as much as poll responses group");
        }

        $date = TypeConverter::stringifyDate(new DateTime());
        $pollName = htmlspecialchars($_POST["poll_name"]);
        $pollDescription = htmlspecialchars($_POST['poll_description']);

        $pollModel = new PollModel();
        $pollId = $pollModel->insert($pollName, $pollDescription, $date);

        if($pollId) {

            $questionModel = new QuestionModel();
            $answerModel = new AnswerModel();

            foreach($_POST["poll_questions"] as $k=>$question) {

                $qId = $questionModel->insert($pollId, htmlspecialchars( $question ));

                if($qId) {

                   if( $answerModel->insertMany($_POST["poll_responses"][$k],$qId ) ) {

                        $this->redirect(MAIN_PATH . "poll/created");

                   }

                }
                else 
                {
                    throw new \Exception("The question hasn't been created"); 
                }
                
            }
        } 
        else {
            throw new \Exception("The poll hasn't been created");
        }

    }

}