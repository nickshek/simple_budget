<?php

use Silex\Provider\FormServiceProvider;
use Silex\Provider\CsrfServiceProvider;
use SimpleBudget\Controller\BudgetIndexController;
$app = new Silex\Application();
$app->register(new FormServiceProvider());
$app->register(new CsrfServiceProvider());
$app->register(new Silex\Provider\ValidatorServiceProvider());
$app->register(new Silex\Provider\TranslationServiceProvider(), array(
    'translator.domains' => array(),
));
$app->register(new Silex\Provider\HttpFragmentServiceProvider());
$app->register(new Silex\Provider\ServiceControllerServiceProvider());
$app->register(new Silex\Provider\TwigServiceProvider());

$containerBuilder = new DI\ContainerBuilder();
$containerBuilder->addDefinitions(require __DIR__.'/di.php');
$container = $containerBuilder->build();
$app['simple_budget.container'] = function () use ($container) {
  return $container;
};

foreach (array(
  array(
    'budget.controller.index',
    BudgetIndexController::class,
  ),
) as list($controller_name, $controller_class)) {
    $app[$controller_name] = function () use ($controller_class,$container) {
      return $container->get($controller_class);
  };
}

return $app;
