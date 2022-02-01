<?php

namespace App\Form;

use App\Entity\Category;
use App\Entity\Partner;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Vich\UploaderBundle\Form\Type\VichImageType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class PartnerType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', TextType::class, ['label' => 'Nom',])
            ->add('pictureFile', VichImageType::class, [
                'label' => 'Image',
                'download_label' => '',
                'delete_label' => 'Supprimer l\'image',
                'required' => false,
            ])
            ->add('link', TextType::class, ['label' => 'Lien',])
            ->add('category', EntityType::class, [
                'class' => Category::class,
                'choice_label' => 'name', 'label' => 'Catégorie'
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Partner::class,
        ]);
    }
}
