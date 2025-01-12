<?php

namespace App\Controller;

use App\Entity\ExpensePaymentCategory;
use App\Form\ExpensePaymentCategoryCreateType;
use App\Service\ExpensePaymentCategoryService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class ExpensePaymentCategoryController extends AbstractController
{
    private $expensePaymentCategoryService;

    public function __construct(ExpensePaymentCategoryService $expensePaymentCategoryService)
    {
        $this->expensePaymentCategoryService = $expensePaymentCategoryService;
    }

    public function index(Request $request): Response
    {
        $deviceType = $request->attributes->get('device');

        $expensePaymentCategories = $this->expensePaymentCategoryService->getAllExpensePaymentCategory();

        return $this->render("{$deviceType}/expense_payment_category/index.html.twig", [
            'expensePaymentCategories' => $expensePaymentCategories
        ]);
    }

    public function create(Request $request): Response
    {
        $deviceType = $request->attributes->get('device');

        $expensePaymentCategory = new ExpensePaymentCategory;
        $form = $this->createForm(ExpensePaymentCategoryCreateType::class, $expensePaymentCategory);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->expensePaymentCategoryService->registerExpensePaymentCategory($expensePaymentCategory, $this->getUser());

            return $this->redirectToRoute('expense_payment_category_index');
        }

        return $this->render("{$deviceType}/expense_payment_category/create.html.twig", [
            'form' => $form->createView(),
        ]);
    }
}
