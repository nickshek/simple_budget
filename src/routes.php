<?php

/* @var $app Silex\Application */
$app->match('/', function (Request $request) use ($app) {
    return $app['twig']->render('index.twig');
});
