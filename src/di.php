<?php

/* @var $app Silex\Application */

use SimpleBudget\Repository\BudgetRepository;
use SimpleBudget\Repository\FileBudgetRepository;

return [
  Twig_Environment::class => function () use ($app) {
    return $app['twig'];
  },
  BudgetRepository::class => DI\object(FileBudgetRepository::class),
];
