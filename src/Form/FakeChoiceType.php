<?php

namespace App\Form;

use App\Entity\FakeChoice;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class FakeChoiceType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('choiceString', ChoiceType::class, [
                'label' => "Values du form sous forme de Strings",
                'placeholder' => "Faites votre choix - strings",
                'choices' => [
                    'Choix 1 - string' => 'Premier Choix',
                    'Choix 2 - string' => 'Second Choix',
                    'Choix 3 - string' => 'Troisième Choix',
                ],
                'choice_attr' => [
                    'choix 1 ' => ['data-attribut' => 42],
                    'choix 2 ' => ['data-attribut' => 30],
                    'choix 3 ' => ['data-autre-chose' => 'Hello world!'],
                ]
            ])
            ->add('ChoiceInt', ChoiceType::class, [
                'label' => "Values sous form de Integer",
                'placeholder' => "Faites votre choix - integers",
                'choices' => [
                    'choix 1 -integer' => 5,
                    'choix 2 -integer' => 2,
                    'choix 3 -integer' => 42,
                ],
                'choice_attr' => function($choice, $key, $value) {
                    $class = strtolower(str_replace(' ', '-', $key));
                    $id = strtolower(str_replace(' ', '-', $value));
                    return [
                        'class' => "choice-$class",
                        'id' => "choice-$id",
                    ];
                }
            ])
            ->add('choiceBool', ChoiceType::class, [
                'label' => "Values du form sous forme de booleans",
                'placeholder' => "Faites votre choix - booleans",
                'choices' => [
                    'choix 1 -boolean' => true,
                    'choix 2 - boolean' => false,
                ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => FakeChoice::class,
        ]);
    }
}
