<?php

/* @var $app Silex\Application */

use SimpleBudget\Repository\BudgetRepository;
use SimpleBudget\Repository\FileBudgetRepository;

return [
  Twig_Environment::class => function () use ($app) {
    return $app['twig'];
  },
  BudgetRepository::class => function () use ($app){
    return new FileBudgetRepository($app["simple_budget.file.path"],$app["simple_budget.default.currency"]);
  }
];
