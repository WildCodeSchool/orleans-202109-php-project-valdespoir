<?php

namespace App\Form;

use App\Entity\Site;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Vich\UploaderBundle\Form\Type\VichImageType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\DateType;

class SiteType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('title', TextType::class, ['label' => 'Titre',])
            ->add('description', TextareaType::class, ['label' => 'Description',])
            ->add('city', TextType::class, ['label' => 'Ville',])
            ->add('beforePictureFile', VichImageType::class, [
                'label' => 'Image avant',
                'download_label' => '',
                'delete_label' => 'Supprimer l\'image',
            ])
            ->add('afterPictureFile', VichImageType::class, [
                'label' => 'Image après',
                'download_label' => '',
                'delete_label' => 'Supprimer l\'image',
            ])
            ->add('date', DateType::class, ['label' => 'Date']);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Site::class,
        ]);
    }
}
