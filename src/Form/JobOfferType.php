<?php

namespace App\Form;

use App\Entity\Client;
use App\Entity\JobCategory;
use App\Entity\JobOffer;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;

class JobOfferType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('description')
            ->add('active', CheckboxType::class, [
                'data' => true,
            ])
            ->add('notes')
            ->add('jobTitle')
            ->add('contractType')
            ->add('location')
            ->add('closingDate', DateType::class, [
                'widget' => 'single_text',
            ])
            ->add('salary')
            ->add('createdAt', DateType::class, [
                'widget' => 'single_text',
            ])
            ->add('clientId', EntityType::class, [
                // looks for choices from this entity
                'class' => Client::class,
                'placeholder' => 'Choose a client ID',
            
                // uses the User.username property as the visible option string
                'choice_label' => 'id',
            
                // used to render a select box, check boxes or radios
                // 'multiple' => true,
                // 'expanded' => true,
            ])
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
            'data_class' => JobOffer::class,
        ]);
    }
}
