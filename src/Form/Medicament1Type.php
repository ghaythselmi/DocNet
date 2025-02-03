<?php

namespace App\Form;

use App\Entity\Medicament;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;




class Medicament1Type extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
        ->add('Nom', TextType::class, [
                'label' => 'Nom',
                'required' => true,
                'constraints' => [
                        new Assert\Length([
                        'min' => 2,
                        'max' => 100,
                        'minMessage' => 'Le champ Nom doit contenir au moins 2 caractères.',
                        'maxMessage' => 'Le champ Nom ne peut pas contenir plus de 50 caractères.',
                    ]),
                ],
            ])
            
            ->add('Type', ChoiceType::class, [
                'choices'  => [
                    'Choisir Type' => '',
                    'Liquide' => 'Liquide',
                    'Comprimé' => 'Comprimé',
                    'Sachét' => 'Sachét',
                ],
            
            ])
            ->add('Nb_dose', IntegerType::class, [
                'label' => 'Nb_dose',
                'required' => true,
                'constraints' => [
                    new Assert\Range([
                        'min' => 1,
                        'max' => 6,
                        'minMessage' => 'Le nombre des doses doit être supérieur ou égal à 1.',
                        'maxMessage' => 'Le nombre des doses doit être inférieur ou égal à 6',
                    ]),
                ],
            ])
            ->add('Prix', NumberType::class, [
                'label' => 'Prix',
                'required' => true,
                'scale' => 2,
                'constraints' => [
                    new Assert\Range([
                        'min' => 100,
                        'max' => 100000000,
                        'minMessage' => 'Le prix doit être supérieur ou égal à 100 Millimes.',
                        'maxMessage' => 'Le prix doit être inférieur ou égal à 1000 Dinars.',
                    ]),
                ],
            ])
            ->add('Stock')
            ->add('id_pharmacie')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Medicament::class,
        ]);
    }
}
