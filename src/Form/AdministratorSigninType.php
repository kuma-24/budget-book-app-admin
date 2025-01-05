<?php

namespace App\Form;

use App\Entity\Administrator;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AdministratorSigninType extends AbstractType
{
    private $formOptions = [
        'email' => [
            'property_path' => 'email',
            'label' => 'メールアドレス',
            'attr' => [
                'placeholder' => 'sample@email.com',
            ],
        ],
        'password' => [
            'property_path' => 'password',
            'label' => 'パスワード',
        ],
    ];

    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('email', EmailType::class, $this->formOptions['email'])
            ->add('password', PasswordType::class, $this->formOptions['password'])
            ->add('signin', SubmitType::class)
            ->setAction('/signin')
            ->setMethod('post')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Administrator::class,
            'csrf_protection' => true,
            'csrf_field_name' => '_token',
        ]);
    }
}
