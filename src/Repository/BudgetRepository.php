<?php

namespace SimpleBudget\Repository;

interface BudgetRepository{
  public function findAll($page = 1);
  public function getBalance($account = NULL);
}
