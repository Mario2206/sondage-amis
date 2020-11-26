<?php


use Core\Router\Router;

try {
    
    $router = new Router($_GET["url"]);

    $router->setControllerNameSpace("App\\Controller\\");

    $router->get("/", "HomeController", "homepage");

    $router->get("/poll", "PollController", "pollListPage");

    $router->get("/poll/creation", "PollController", "createPollPage");

    $router->post("/poll/creation", "PollController", "createPoll");

    $router->get("/poll/created", "PollController", "confirmCreatePollPage");

    $router->get("/register", "UserController", "registerPage");

    $router->post("/register", "UserController", "register");

    $router->get("/login", "UserController", "loginPage");

    $router->post("/login", "UserController", "login");

    $router->get("/poll/myAccount", "UserController", "accountPage");

    $router->post("/poll/myAccount", "UserController", "accountSet");

    $router->parse();



} catch(Exception $e) {
    echo "<strong>Error : $e</strong>";
}

