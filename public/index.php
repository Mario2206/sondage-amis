<?php

use Core\Autoloader;

//AUTOLOADER FILE
require("../Core/Autoloader.php");

//DATABASE CONFIGURATION FILE
require ('../Configuration/db/dbConfiguration.php');

//GLOBAL CONFIGURATION FILE
require("../Configuration/configuration.php");

Autoloader::start();

//APP ROUTES
require("../App/Route/routes.php");