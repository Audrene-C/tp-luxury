<?php

namespace App\Form;

use App\Entity\Application;
use App\Entity\Candidate;
use App\Entity\JobOffer;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class ApplicationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('candidate', EntityType::class, [
                // looks for choices from this entity
                'class' => Candidate::class
            ])
            ->add('jobOffer', EntityType::class, [
                // looks for choices from this entity
                'class' => JobOffer::class
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Application::class,
        ]);
    }
}
