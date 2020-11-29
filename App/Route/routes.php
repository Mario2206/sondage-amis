<?php


use Core\Router\Router;

require(ROOT ."/App/Constant/routes.php");

try {
    
    $router = new Router($_GET["url"]);

    $router->setControllerNameSpace("App\\Controller\\");

    $router->get(HOME, "HomeController", "homepage");

    $router->get(POLL_LIST, "CreatePollController", "pollListPage");

    $router->get(POLL_CREATION, "CreatePollController", "createPollPage");

    $router->post(POLL_CREATION, "CreatePollController", "createPoll");

    $router->get(POLL_CREATED, "CreatePollController", "confirmCreatePollPage");

    $router->get(POLL_REPORT . "/:poll_id", "PollReportController", "getPollReport");

    $router->get(REGISTER, "UserController", "registerPage");

    $router->post(REGISTER, "UserController", "register");

    $router->get(LOGIN, "UserController", "loginPage");

    $router->post(LOGIN, "UserController", "login");

    $router->get(ACCOUNT, "UserController", "accountPage");

    $router->post(ACCOUNT, "UserController", "accountSet");

    $router->parse();



} catch(Exception $e) {
    echo "<strong>Error : $e</strong>";
}

