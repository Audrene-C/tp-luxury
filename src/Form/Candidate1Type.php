<?php

namespace App\Form;

use App\Entity\Candidate;
use App\Entity\JobCategory;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
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
            ->add('passport', CheckboxType::class, [
                'label' => 'Do you have a passport ?',
            ])
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
            ])
            ->add('placeOfBirth')
            ->add('email')
            ->add('availability')
            ->add('experience', ChoiceType::class, [
                'choices' => [
                    '0 - 6 month' => '0 - 6 month',
                    '6 month - 1 year' => '6 month - 1 year',
                    '1 - 2 years' => '1 - 2 years',
                    '2+ years' => '2+ years',
                    '5+ years' => '5+ years',
                    '10+ years' => '10+ years',
                    ]
                ]
            )
            ->add('description')
            ->add('notes')
            // ->add('createdAt')
            // ->add('updatedAt')
            // ->add('deletedAt')
            ->add('passportFile', FileType::class , [
                'mapped' => false
                ]
            )
            ->add('jobCategory', EntityType::class, [
                // looks for choices from this entity
                'class' => JobCategory::class,
                'placeholder' => 'Choose a category',

                // uses the User.username property as the visible option string
                'choice_label' => 'category',

                // used to render a select box, check boxes or radios
                // 'multiple' => true,
                // 'expanded' => true,
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Candidate::class,
        ]);
    }
}
