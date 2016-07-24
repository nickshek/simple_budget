<?php

namespace SimpleBudget\Controller;
use Twig_Environment;
use SimpleBudget\Repository\BudgetRepository;

class BudgetIndexController{
  private $twig;

  public function __construct(Twig_Environment $twig){
    $this->twig = $twig;
  }

  public function index(){
    return $this->twig->render('index.twig');
  }
}
