<?php

namespace SimpleBudget\Controller;

use Twig_Environment;
use SimpleBudget\Repository\BudgetRepository;

class BudgetIndexController
{
    private $twig;
    private $budget_repository;

    public function __construct(Twig_Environment $twig, BudgetRepository $budget_repository)
    {
        $this->twig = $twig;
        $this->budget_repository = $budget_repository;
    }

    public function index()
    {
        $account_list = $this->budget_repository->findAllAccount();
        $balacne = $this->budget_repository->getBalance();
        $items = $this->budget_repository->getTransactionHistory();

        return $this->twig->render('index.twig', array(
          'account_list' => $account_list,
          'balacne' => $balacne,
          'items' => $items,
        ));
    }
}
