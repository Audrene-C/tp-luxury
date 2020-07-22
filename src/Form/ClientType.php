<?php

namespace App\Form;

use App\Entity\Client;
use App\Entity\JobCategory;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Email;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class ClientType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('societyName')
            ->add('contactName')
            ->add('contactPosition')
            ->add('contactPhone')
            ->add('contactEmail', EmailType::class, [
                'constraints' => [
                    new Email(['message' => 'Please enter a valid email address.'])
                    ]
                ])
            ->add('notes')
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
            'data_class' => Client::class,
        ]);
    }
}
