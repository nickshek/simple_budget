<?php

require_once __DIR__.'/../vendor/autoload.php';

use Silex\Provider\FormServiceProvider;
use Symfony\Component\HttpFoundation\Request;
use Silex\Provider\CsrfServiceProvider;

define('ENVIRONMENT', isset($_SERVER['SILEX_ENV']) ? $_SERVER['SILEX_ENV'] : 'development');

$app = require __DIR__.'/../src/app.php';
require __DIR__.'/../config/'.ENVIRONMENT.'.php';

$app->match('/', function (Request $request) use ($app) {
    return $app['twig']->render('index.twig');
});

$app->run();
