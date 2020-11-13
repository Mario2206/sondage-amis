<?php

use App\Controller\HomeController;
use Core\Autoloader;


require("../Core/Autoloader.php");
require ('../Configuration/dbConfiguration.php');

Autoloader::start();

require("../App/Route/routes.php");