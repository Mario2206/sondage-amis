<?php

use App\Controller\HomeController;
use Core\Router\Router;

try {
    
    $router = new Router($_GET["url"]);

    $router->get("/", function () {
        $homeController = new HomeController();
        $homeController->homepage();
    });   

    $router->get("/test", function () {
        echo "test";
    });

    $router->parse();

} catch(Exception $e) {
    echo "<strong>Error : $e</strong>";
}

