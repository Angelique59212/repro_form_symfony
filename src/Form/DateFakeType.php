<?php

namespace App\Form;

use App\Entity\DateFake;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\BirthdayType;
use Symfony\Component\Form\Extension\Core\Type\DateIntervalType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TimeType;
use Symfony\Component\Form\Extension\Core\Type\WeekType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class DateFakeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $years = new \DateTime();
        $builder
            ->add('date', DateType::class, [
                'widget' => 'choice',
                'days' => range(1,32,2),
                'months' => [1,2,3],
                'years' => range((int)$years->format('Y'), (int)$years->modify('+ 10 years')->format('Y'))
            ])
            ->add('dateInterval', DateIntervalType::class, [
                'label' => "Ca s'est passé il y a ...",
                'with_seconds' => true,
                'with_minutes' => true,
                'with_hours' => true,
                'with_days' => true,
                'with_months' => true,
                'with_years' => true,
                'labels' => [
                    'years' => 'Années',
                    'months' => 'Mois',
                    'days' => 'Jours'
                ]
            ])
            ->add('datetime', DateTimeType::class, [
                'label' => "Quand cela s'est il produit?",
                'date_widget' => 'single_text',
                'time_widget' => 'choice',
                'date_label' => "Sélectionner une date",
                'time_label' => "Quel est l'heure prévu?"
            ])
            ->add('time', TimeType::class)
            ->add('birthday', BirthdayType::class)
            ->add('week', WeekType::class, [
                'widget' => 'choice',
                'years' => [2020, 2021, 2022],
                'weeks' => range(1,40),
            ])

            ->add('save', SubmitType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => DateFake::class,
        ]);
    }
}
