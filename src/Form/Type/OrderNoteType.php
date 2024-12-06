<?php

namespace App\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Sylius\Bundle\OrderBundle\Form\Type\OrderType as BaseOrderType;

class OrderNoteType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder->add('note', TextType::class, [
            'required' => false,
            'label' => 'Note',
            'attr' => [
                'maxlength' => 500,
            ],
        ]);
    }

    public function getParent(): string
    {
        return BaseOrderType::class;
    }
}


