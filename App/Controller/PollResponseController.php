<?php 

namespace App\Controller;

use App\Model\AnswerModel;
use App\Model\PollModel;
use App\Model\QuestionModel;
use Core\Controller\Controller;
use Core\Tools\Cleaner;

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

        if(!$poll) {
            $this->redirect(POLL_LIST_FRIENDS);
        }

        $this->render("pollResponseStartView", ["poll" => $poll[0]]);

    }

    public function pageForAnswers (string $pollId) {
        $poll = $this->pollModel->find(["idPoll" => $pollId]);

        if(!$poll) {
            $this->redirect(POLL_LIST_FRIENDS);
        }

        $this->render("pollResponseView", ["poll"=>$poll[0]]);
    }

    public function endPage() {
        
    }

    public function getQuestion($pollId, $questionNumber) {
        $question = $this->questionModel->findQuestionWithAnswers($pollId, $questionNumber - 1);

        var_dump($question);
        $this->renderJson($question);
    }

    public function answer () {

    }

}