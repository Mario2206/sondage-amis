<?php 

namespace App\Controller;

use App\Model\PollModel;
use Core\Controller\Controller;
use Core\Model\Converters\TypeConverter;
use Core\Tools\Session;
use DateTime;

class PollManagerController extends Controller {

    private $pollModel;
    private $user;

    public function __construct()
    {
        $this->user = Session::get("user");
        $this->protectPageFor("user", "/login");
        $this->pollModel = new PollModel();
    }

    public function getPollReport( string $idPoll) {

        $dataPoll = $this->pollModel->getPollAndRef($idPoll);
        $poll = $dataPoll["poll"]; 
        $questions = $dataPoll["questions"];
        $currentDate = TypeConverter::stringifyDate(new DateTime());
        
        $this->render("poll-report", compact("poll", "questions", "currentDate"));

    }

    public function closePoll(string $pollId) {
        
        $closeDate = TypeConverter::stringifyDate(new DateTime());
        $res = $this->pollModel->update(["unAvailableAt" => $closeDate], $pollId, $this->user->idUser);

        if($res) {
            $this->redirect(POLL_LIST);
        }
        else 
        {
            $this->redirectWithErrors(POLL_LIST, "Le sondage n'a pas pu être clôturé");
        }
    }

    public function openPoll(string $pollId) {
        $this->checkPostKeys($_POST, ["availableAt", "unAvailableAt"]);
        
        $res = $this->pollModel->update(
            ["availableAt"=>$_POST["availableAt"], "unAvailableAt" => $_POST["unAvailableAt"]],
            $pollId,  
            $this->user->idUser
         );

         if($res) {
             var_dump($res);
             die();
             $this->redirect(POLL_LIST);
         }
         $this->redirectWithErrors(POLL_LIST, "Erreur lors de l'ouverture du sondage");


    }

}