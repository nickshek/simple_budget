<?php

require_once __DIR__.'/../vendor/autoload.php';

use Symfony\Component\HttpFoundation\Request;

define('ENVIRONMENT', isset($_SERVER['SILEX_ENV']) ? $_SERVER['SILEX_ENV'] : 'development');
define('BASEPATH', realpath(__DIR__.'/../'));

$app = require __DIR__.'/../src/app.php';
require __DIR__.'/../config/'.ENVIRONMENT.'.php';
require __DIR__.'/../src/twig.php';
require __DIR__.'/../src/routes.php';

$app->run();
