<?php

namespace App\Service;

use App\Entity\Administrator;
use App\Entity\ExpenseCategory;
use App\Repository\ExpenseCategoryRepository;

class ExpenseCategoryService
{
    private $expenseCategoryRepository;

    public function __construct(ExpenseCategoryRepository $expenseCategoryRepository)
    {
        $this->expenseCategoryRepository = $expenseCategoryRepository;
    }

    public function registerExpenseCategory(ExpenseCategory $expenseCategory, Administrator $administrator)
    {
        $expenseCategory->setAdministrator($administrator);
        $this->expenseCategoryRepository->save($expenseCategory);
    }

    public function getAllExpenseCategory()
    {
        return $this->expenseCategoryRepository->selectAll();
    }
}