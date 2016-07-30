<?php

namespace SimpleBudget\Repository;

interface BudgetRepository{
  public function findAll($page = 1);
}
