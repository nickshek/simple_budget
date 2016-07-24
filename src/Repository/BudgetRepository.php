<?php

namespace SimpleBudget\Repository;

interface BudgetRepository{
  function findAll($page = 1);
}
