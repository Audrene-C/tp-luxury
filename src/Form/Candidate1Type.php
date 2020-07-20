<?php

namespace App\Form;

use App\Entity\Candidate;
// use Doctrine\DBAL\Types\DateType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class Candidate1Type extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('gender', ChoiceType::class, [
                'choices' => [
                    'Male' => 0,
                    'Female' => 1,
                    ]
                ])
            ->add('firstName')
            ->add('lastName')
            ->add('adress')
            ->add('country')
            ->add('nationality')
            ->add('passport', FileType::class , [
                'mapped' => false
                ]
            )
            ->add('cv', FileType::class , [
                'mapped' => false
                ]
            )
            ->add('profilPicture', FileType::class , [
                'mapped' => false
                ]
            )
            ->add('currentLocation')
            ->add('dateOfBirth', DateType::class, [
                'widget' => 'single_text',
                // 'input' =>  'datetime_immutable'
            ])
            ->add('placeOfBirth')
            ->add('email')
            ->add('availability')
            ->add('experience')
            ->add('description')
            ->add('notes')
            // ->add('createdAt')
            // ->add('updatedAt')
            // ->add('deletedAt')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Candidate::class,
        ]);
    }
}
