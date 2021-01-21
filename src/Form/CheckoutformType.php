<?php

namespace App\Form;

use App\Entity\Checkout;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class CheckoutformType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('FirstName', TextType::class)
            ->add('LastName', TextType::class)
            ->add('Email', EmailType::class)
            ->add('Phone', NumberType::class)
            ->add('CompanyName', TextType::class)
            ->add('Address', TextType::class)
            ->add('City', TextType::class)
            ->add('PostCode', NumberType::class);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Checkout::class,
        ]);
    }
}
