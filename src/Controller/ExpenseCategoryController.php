<?php

namespace App\Controller;

use App\Entity\ExpenseCategory;
use App\Form\ExpenseCategoryCreateType;
use App\Service\ExpenseCategoryService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class ExpenseCategoryController extends AbstractController
{
    private $expenseCategoryService;

    public function __construct(ExpenseCategoryService $expenseCategoryService)
    {
        $this->expenseCategoryService = $expenseCategoryService;
    }

    public function index(Request $request): Response
    {
        $deviceType = $request->attributes->get('device');

        $expenseCategories = $this->expenseCategoryService->getAllExpenseCategory();

        return $this->render("{$deviceType}/expense_category/index.html.twig", [
            'expenseCategories' => $expenseCategories
        ]);
    }

    public function create(Request $request): Response
    {
        $deviceType = $request->attributes->get('device');

        $expenseCategory = new ExpenseCategory;
        $form = $this->createForm(ExpenseCategoryCreateType::class, $expenseCategory);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->expenseCategoryService->registerExpenseCategory($expenseCategory, $this->getUser());

            return $this->redirectToRoute('expense_category_index');
        }

        return $this->render("{$deviceType}/expense_category/create.html.twig", [
            'form' => $form->createView(),
        ]);
    }
}
