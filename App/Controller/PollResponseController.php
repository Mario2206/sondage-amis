<?php 

namespace App\Controller;

use App\Model\AnswerModel;
use App\Model\PollModel;
use App\Model\QuestionModel;
use Core\Controller\Controller;

class PollResponseController extends Controller {
    private $pollModel;
    private $answerModel;
    private $questionModel;

    public function __construct()
    {
        $this->pollModel = new PollModel();
        $this->answerModel = new AnswerModel();
        $this->questionModel = new QuestionModel();
    }

    public function startPage(string $pollId) {
        $poll = $this->pollModel->find(["idPoll" => $pollId]);
        $this->render("pollResponseStartView", ["poll" => $poll[0]]);

    }

    public function endPage() {
        
    }

    public function getQuestion() {

    }

    public function answer () {

    }

}