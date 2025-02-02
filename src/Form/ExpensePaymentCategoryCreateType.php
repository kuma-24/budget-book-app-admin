<?php

namespace App\Form;

use App\Entity\ExpensePaymentCategory;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ExpensePaymentCategoryCreateType extends AbstractType
{
    private $formOptions = [
        'name' => [
            'property_path' => 'name',
            'label' => '決済カテゴリ名',
            'attr' => [
                'placeholder' => '現金・クレジットカードなど',
            ],
        ],
    ];

    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', TextType::class, $this->formOptions['name'])
            ->add('save', SubmitType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => ExpensePaymentCategory::class
        ]);
    }
}
