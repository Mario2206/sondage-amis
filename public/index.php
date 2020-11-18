<?php

use Core\Autoloader;

//GLOBAL CONFIGURATION FILE
require("../Configuration/configuration.php");

//AUTOLOADER FILE
require("../Core/Autoloader.php");

//DATABASE CONFIGURATION FILE
require ('../Configuration/db/dbConfiguration.php');


Autoloader::start();

//APP ROUTES
require("../App/Route/routes.php");