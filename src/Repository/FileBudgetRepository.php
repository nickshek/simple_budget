<?php

namespace SimpleBudget\Repository;

class FileBudgetRepository implements BudgetRepository
{
    private $file_path;
    private $default_currency;

    public function __construct($file_path, $default_currency)
    {
        $this->file_path = $file_path;
        $this->default_currency = $default_currency;
    }

    public function findAll($page = 1)
    {
        return array(
            array(
              'name' => 'budget1',
              'slug' => 'budget1',
              'description' => '',
            ),
            array(
              'name' => 'budget2',
              'slug' => 'budget2',
              'description' => '',
            ),
        );
    }
}
