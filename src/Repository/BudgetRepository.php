<?php

namespace SimpleBudget\Repository;

interface BudgetRepository{
  public function findAllAccount($page = 1);
  public function getBalance($account = NULL);
  public function getTransactionHistory($page = 1);
}
