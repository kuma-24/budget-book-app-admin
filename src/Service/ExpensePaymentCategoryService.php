<?php

namespace App\Service;

use App\Entity\Administrator;
use App\Entity\ExpensePaymentCategory;
use App\Repository\ExpensePaymentCategoryRepository;

class ExpensePaymentCategoryService
{
    private $expensePaymentCategoryRepository;

    public function __construct(ExpensePaymentCategoryRepository $expensePaymentCategoryRepository)
    {
        $this->expensePaymentCategoryRepository = $expensePaymentCategoryRepository;
    }

    public function registerExpensePaymentCategory(ExpensePaymentCategory $expensePaymentCategory, Administrator $administrator)
    {
        $expensePaymentCategory->setAdministrator($administrator);
        $this->expensePaymentCategoryRepository->save($expensePaymentCategory);
    }

    public function getAllExpensePaymentCategory()
    {
        return $this->expensePaymentCategoryRepository->selectAll();
    }
}