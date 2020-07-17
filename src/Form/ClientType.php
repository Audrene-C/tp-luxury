<?php

namespace App\Form;

use App\Entity\Client;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Email;
use Symfony\Component\Form\Extension\Core\Type\EmailType;

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
            ->add('jobCategory')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Client::class,
        ]);
    }
}
