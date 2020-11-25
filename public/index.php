<?php

use Core\Autoloader;

//START SESSION
session_start();

//GLOBAL CONFIGURATION FILE
require("../Configuration/configuration.php");

//AUTOLOADER FILE
require("../Core/Autoloader.php");

//DATABASE CONFIGURATION FILE
require ('../Configuration/db/dbConfiguration.php');


Autoloader::start();

//APP ROUTES
require("../App/Route/routes.php");