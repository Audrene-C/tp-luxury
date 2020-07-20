<?php

namespace App\Form;

use App\Entity\JobCategory;
use App\Entity\JobOffer;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class JobOfferType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('description')
            ->add('active')
            ->add('notes')
            ->add('jobTitle')
            ->add('contractType')
            ->add('location')
            ->add('closingDate')
            ->add('salary')
            ->add('createdAt')
            ->add('clientId')
            ->add('jobCategory', EntityType::class, [
                // looks for choices from this entity
                'class' => JobCategory::class,
            
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
            'data_class' => JobOffer::class,
        ]);
    }
}
