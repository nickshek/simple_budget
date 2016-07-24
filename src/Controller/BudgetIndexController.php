<?php

namespace SimpleBudget\Controller;

class BudgetIndexController{
  public function index(Silex\Application $app){
    return $app['twig']->render('index.twig');
  }
}
