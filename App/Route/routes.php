<?php

use App\Controller\HomeController;
use Core\Router\Router;

try {
    
    $router = new Router($_GET["url"]);

    $router->setControllerNameSpace("App\\Controller\\");

    $router->get("/", "HomeController", "homepage");

    $router->get("/poll", "PollController", "pollsListPage");

    $router->get("/poll/creation", "PollController", "createPollPage");

    $router->post("/poll/creation", "PollController", "createPoll");

    $router->get("/poll/created", "PollController", "confirmCreatePollPage");


    $router->parse();



} catch(Exception $e) {
    echo "<strong>Error : $e</strong>";
}

