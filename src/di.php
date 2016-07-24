<?php

/* @var $app Silex\Application */

use Twig_Environment;

return [
  Twig_Environment::class => function () use ($app) {
    return $app['twig'];
  },
];
