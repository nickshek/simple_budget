<?php

namespace SimpleBudget\Repository;
use DateTime;

class FileBudgetRepository implements BudgetRepository
{
    private $file_path;
    private $default_currency;

    public function __construct($file_path, $default_currency)
    {
        $this->file_path = $file_path;
        $this->default_currency = $default_currency;
    }

    private function getTransaction($account = null){
      $dirs = $this->getAllDirs();
      $items = array();
      $budgets = array();
      foreach ($dirs as $dir) {
          $budget = require implode('/', array($this->file_path, $dir, 'budget.php'));
          array_push($budgets, $budget);
          $items = array_merge($items,$budget['items']);
      }

      return $items;
    }

    public function getBalance($account = null)
    {
        $dirs = $this->getAllDirs();
        $items = array();
        $budgets = array();
        foreach ($dirs as $dir) {
            $budget = require implode('/', array($this->file_path, $dir, 'budget.php'));
            array_push($budgets, $budget);
            $items = array_merge($items,$budget['items']);
        }

        return array_reduce($items, function ($sum, $item) {
        return $sum - $item["price"];
      }, 0);
    }

    private function getAllDirs()
    {
        $dirs = array_filter(glob(implode('/', array($this->file_path, '*'))), 'is_dir');
        $list = require implode('/', array($this->file_path, 'list.php'));
        $dirs = array_map(function ($dir) use ($list) {
          $dir = basename($dir);

          return $dir;
        }, $dirs);

        return $dirs;
    }

    public function findAllAccount($page = 1)
    {
        $list = $this->getAllDirs();

        return array_map(function ($dir) use ($list) {
          if (array_key_exists($dir, $list)) {
              return $list[$dir];
          } else {
              return array(
              'name' => $dir,
              'slug' => $dir,
              'description' => $dir,
            );
          }
        }, $this->getAllDirs());
    }

      public function getTransactionHistory($page = 1){
          $items = $this->getTransaction(NULL);

          $items = array_map(function($item){
            $item["date_obj"] = DateTime::createFromFormat('Y-m-d H:i:s', $item['date']);
            return $item;
          }, $items);

          usort($items, function ($a, $b) {
              return $a['date_obj'] < $b['date_obj'];
          });


          return $items;
      }
}
