<?php

namespace SimpleBudget\Controller;
use Twig_Environment;
use SimpleBudget\Repository\BudgetRepository;

class BudgetIndexController{
  private $twig;
  private $budget_repository;

  public function __construct(Twig_Environment $twig,BudgetRepository $budget_repository){
    $this->twig = $twig;
    $this->budget_repository = $budget_repository;
  }

  public function index(){
    $budget = $this->budget_repository->findAll();
    return $this->twig->render('index.twig',compact($budget));
  }
}
