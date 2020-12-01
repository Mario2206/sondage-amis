<?php


use Core\Router\Router;

require(ROOT ."/App/Constant/routes.php");

try {
    
    $router = new Router($_GET["url"]);

    $router->setControllerNameSpace("App\\Controller\\");

    //HOME

    $router->get(HOME, "HomeController", "homepage");

    // POLL ROUTES

    $router->get(POLL_LIST, "PollController", "pollList");

    $router->get(POLL_CREATION, "CreatePollController", "createPollPage");

    $router->post(POLL_CREATION, "CreatePollController", "createPoll");

    $router->get(POLL_CREATED, "CreatePollController", "confirmCreatePollPage");

    $router->get(POLL_REPORT . "/:poll_id", "PollManagerController", "getPollReport");

    $router->get(POLL_CLOSE . "/:poll_id", "PollManagerController", "closePoll");

    $router->post(POLL_OPEN . "/:poll_id", "PollManagerController", "openPoll");

    //USER ROUTES

    // USER
    $router->get(REGISTER, "RegisterController", "registerPage");

    $router->post(REGISTER, "RegisterController", "register");

    $router->get(LOGIN, "LoginController", "loginPage");

    $router->post(LOGIN, "LoginController", "login");

    $router->get(ACCOUNT, "AccountController", "accountPage");

    $router->post(ACCOUNT, "AccountController", "accountSet");

    // FRIENDS
    $router->get(FRIENDS, "FriendsController", "friendsPage");



    $router->parse();




    

} catch(Exception $e) {
    echo "<strong>Error : $e</strong>";
}

