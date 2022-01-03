<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use App\Entity\Contact;

class ContactType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
        ->add('firstName', TextType::class, ['label' => 'Nom'])
        ->add('lastName', TextType::class, ['label' => 'Prénom'])
        ->add('subject', ChoiceType::class, [
            'placeholder' => 'Choisir une option',
            'choices' => [
                'Répondre à une offre d\'emploi' => 'Répondre à une offre d\'emploi',
                'Candidature spontannée' => 'Candidature spontanée',
                'Demande de devis' => 'Demande de devis',
                'Demande de travaux' => 'Demande de travaux',
                'Autres' => 'Autres'
            ],
            'expanded' => false, 
            'multiple' => false,
            'by_reference' => false,
        ])
        ->add('email', EmailType::class, ['label' => 'E-mail'])
        ->add('message', TextareaType::class, ['label' => 'Message']);
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Contact::class
        ]);
    }
}
