<?php

use App\Controller\HomeController;
use Core\Autoloader;


require("../Core/Autoloader.php");

Autoloader::start();

$homeController = new HomeController();
$homeController->homepage();