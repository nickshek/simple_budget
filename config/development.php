<?php

use Silex\Provider\MonologServiceProvider;
use Silex\Provider\WebProfilerServiceProvider;

/* @var $app Silex\Application */

// include the prod configuration
require __DIR__.'/production.php';

// enable the debug mode
$app['debug'] = true;
$app["simple_budget.base_url"] = "http://localhost:8000/";
$app->register(new MonologServiceProvider(), array(
    'monolog.logfile' => __DIR__.'/../logs/silex_dev.log',
));
$app->register(new WebProfilerServiceProvider(), array(
    'profiler.cache_dir' => __DIR__.'/../cache/profiler',
));
