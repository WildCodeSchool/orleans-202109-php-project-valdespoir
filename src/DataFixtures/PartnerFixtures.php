<?php

namespace App\DataFixtures;

use App\Entity\Partner;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Vich\UploaderBundle\Form\Type\VichImageType;

class PartnerFixtures extends Fixture
{
    public const PARTNERS = [
        [
            'name' => 'Région Centre Val de Loire',
            'link' => 'https://www.centre-valdeloire.fr/',
            'picture' => 'https://www.tiralarc-centrevaldeloire.fr/media/uploaded/s
        ites/12275/partenaire/58efe73576307_LogoRegionCentreValdeloire.jpg',
        'date' => '17/01/2022'
        ],
        [
            'name' => 'Agglomération Orléans',
            'link' => 'https://www.orleans-metropole.fr/',
            'picture' => 'https://upload.wikimedia.org/wikipedia/fr/d/dd/Agglo_orl%C3%A9ans.jpg',
            'date' => '17/01/2022'
        ],
        [
            'name' => 'Conseil Départementale',
            'link' => 'https://www.loiret.fr/',
            'picture' => 'https://upload.wikimedia.org/wikipedia/fr/e/e0/Loiret_logo.jpg',
            'date' => '17/01/2022'
        ],
    ];
    public function load(ObjectManager $manager): void
    {
        foreach (self::PARTNERS as $partners) {
            $partner = new Partner();
            $partner->setName($partners['name']);
            $partner->setLink($partners['link']);
            $partner->setPictureFile($partners['picture']);
            //$partner->setDate($partners['date']);
            $partner->$manager->persist($partner);
        }
        $manager->flush();
    }
}
