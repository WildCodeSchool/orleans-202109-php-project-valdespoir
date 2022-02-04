<?php

namespace App\Form;

use App\Entity\Actuality;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Vich\UploaderBundle\Form\Type\VichImageType;

class ActualityType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('title', TextType::class, ['label' => 'Titre',])
            ->add('shortDescription', TextareaType::class, ['label' => 'Résumé',])
            ->add('description', TextareaType::class, ['label' => 'Contenu',])
            ->add('pictureFile', VichImageType::class, [
                'label' => 'Image',
                'download_label' => '',
                'delete_label' => 'Supprimer l\'image',
                'required' => false,
            ])
            ->add('date', DateTimeType::class, ['label' => 'Date']);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Actuality::class,
        ]);
    }
}
