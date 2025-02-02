<?php

namespace App\Form;

use App\Entity\ExpenseCategory;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ExpenseCategoryCreateType extends AbstractType
{
    private $formOptions = [
        'name' => [
            'property_path' => 'name',
            'label' => '費目カテゴリ名',
            'attr' => [
                'placeholder' => '生活費・外食費など',
            ],
        ],
        'budgetAmount' => [
            'property_path' => 'budgetAmount',
            'label' => '金額',
            'html5' => true,
            'required' => false,
        ],
    ];

    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', TextType::class, $this->formOptions['name'])
            ->add('budgetAmount', NumberType::class, $this->formOptions['budgetAmount'])
            ->add('save', SubmitType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => ExpenseCategory::class
        ]);
    }
}
