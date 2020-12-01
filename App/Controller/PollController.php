<?php 

namespace App\Controller;

use App\Model\PollModel;
use Core\Controller\Controller;
use Core\Model\Converters\TypeConverter;
use Core\Tools\Session;

class PollController extends Controller {

    private $user;

    public function __construct()
    {
        $this->user = Session::get("user");
        $this->protectPageFor("user", "/login");
    }

    public function pollList () {

        $pollModel = new PollModel();
        $polls = $pollModel->find(["idUser"=>$this->user->idUser]);
        $currentDate = date(TypeConverter::DATE_FORMAT);

        $this->render("pollListView", compact("polls", "currentDate"));
    }

}