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
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Vich\UploaderBundle\Form\Type\VichFileType;
use Vich\UploaderBundle\Form\Type\VichImageType;

class CandidateType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('gender', ChoiceType::class, [
                'choices' => [
                    'Male' => 'male',
                    'Female' => 'female',
                    'Transgender' => 'transgender'
                    ]
                ])
            ->add('firstName')
            ->add('lastName')
            ->add('adress')
            ->add('country')
            ->add('nationality')
            ->add('passport', CheckboxType::class, [
                'label' => 'Do you have a passport ?',
                'required' => false
            ])
            ->add('cvFile', VichFileType::class , [
                'required' => false,
                ]
            )
            ->add('profilPictureFile', VichFileType::class , [
                'required' => false
                ]
            )
            ->add('currentLocation')
            ->add('dateOfBirth', DateType::class, [
                'widget' => 'single_text',
            ])
            ->add('placeOfBirth')
            ->add('availability', CheckboxType::class, [
                'required' => false,
                'label' => 'Are you available ?',
            ])
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
            ->add('description', TextareaType::class, [
                'attr' => ['class' => 'materialize-textarea',
                            'cols' => '50',
                            'rows' => '10'],
                'required' => false,
                ]
            )
            ->add('passportFileUpload', VichFileType::class , [
                'required' => false,
                ]
            )
            ->add('jobCategory', EntityType::class, [
                // looks for choices from this entity
                'class' => JobCategory::class,
                'required' => false,
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
