<?php

namespace App\Form;

use App\Entity\Fake;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ColorType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RangeType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TelType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\UrlType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Polyfill\Intl\Icu\NumberFormatter;

class FakeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
//            -> add('name', TextType::class, [
//
//                'label' => "Entrez le nom du fake", // Le label <label> du champs
//                'attr' => [ // Pour spécifier des attr HTML ou widget 'input, select ...'
//                    'maxlenght' => 200, // Validation HTML de longueur max
//                    'minlenght' => 100, // Validation HTML de longueur min
//                    'class' => 'ma-classe' // Ajout d'une classe CSS
//
//                ],
//                'label-attr' => [ // Pour spécifier des attributs HTML pour le label de l'input
//                    'class' => 'ma-classe-label',
//                ],
//                'required' => false, // Pour définir un champs non obligatoire, il est obligatoire par défaut
//                'data' => 'Mes données forcées', // Pour forcer les données lors de l'affichage du formulaire
//                'trim' = false, // Pour ne pas trim les données reçue , il est a true par défaut
//                'disabled' => true, // Pour désactiver l'édition du champs
//                'empty_data' => 'Valeur par défaut et pas spécifier' // POur fournir une val par déft en cas de require false et donnée pas fournies
//	'mapped' => false, // Si et uniquement si le champ n'est pas lié à une prop de l'entité
//	'help'=> "<p>Mon texte d'aide pour les users</p>" // Définir un texte d'aide pour les users
//	'help_attr' => [
//        'class' => 'classe-aide-text'
//    ],
//	'help_html' => true, // Permet de définir si le texte d'aide est au format HTML ou non (false par défaut)
            ->add('name', TextType::class, [
                'label' => 'Entrez le nom du fake',
                'required' =>false,
                'empty_data' => "Anonymous Fake",
                'help' => "Mon text d'aide pour les users",
                'attr' => [
                    'class' => 'ma-classe-css',
                    'data-test' => 'ma-valeur',
                ]

            ])
            ->add('email', EmailType::class, [
                'label' => "Entrez votre adresse mail",
                'attr' => [
                    'placeholder' =>"mail@example.org",
                    'class' => "css-email-class",
                ]
            ])
            ->add('sign', TextareaType::class, [
                'label' => "Entre la prop sign",
                'attr' => [
                    'rows' => 10,
                    'cols' => 10,
                ]
            ])
            ->add('age', IntegerType::class, [
                'rounding_mode' => NumberFormatter::ROUND_HALFUP,
                'label' => "Entrez votre âge",
            ])
            ->add('currency', MoneyType::class, [
                'label' =>"Montant à appliquer",
                'currency' => 'USD',
                'rounding_mode' => NumberFormatter::ROUND_HALFUP
            ])
            ->add('price', NumberType::class, [
                'label' => "Entrez un prix",
                'rounding_mode' => NumberFormatter::ROUND_HALFUP
            ])
            ->add('password', PasswordType::class, [
                'label' => "Entrez votre password"
            ])
            ->add('url', UrlType::class, [
                'label' => "Entrez une URL valide",
                'help' => "Une url valide commence toujours par https://",
                'default_protocol' => "https://",
            ])
            ->add('userRange', RangeType::class, [
                'label' => "Sélectionnez une range",
                'help' => "Range de prix",
                'attr' => [
                    'min' =>10 ,
                    'max' => 52,
                ]
            ])
            ->add('phone', TelType::class, [
                'label' => "Entrez votre numéro de téléphone",
                'help' => "Format: +33...",
            ])
            ->add('color', ColorType::class)

            ->add('save', SubmitType::class, [
                'label' => 'Enregistrer',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Fake::class,
        ]);
    }
}
