<?php

namespace App\DataFixtures;

use App\Entity\Partner;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class PartnerFixtures extends Fixture
{
    public const PARTNERS = [
        ['name' => 'Région Centre Val de Loire',
        'https://www.tiralarc-centrevaldeloire.fr/media/uploaded/s
        ites/12275/partenaire/58efe73576307_LogoRegionCentreValdeloire.jpg',
        'https://www.centre-valdeloire.fr/'],
        ['name' => 'Agglomération Orléans', 'https://upload.wikimedia.org/wikipedia/fr/d/dd/Agglo_orl%C3%A9ans.jpg',
        'https://www.orleans-metropole.fr/'],
        ['name' => 'Conseil Départementale', 'https://upload.wikimedia.org/wikipedia/fr/e/e0/Loiret_logo.jpg',
        'https://www.loiret.fr/'],
    ];
    /*public function load(ObjectManager $manager): void
    {
        foreach (self::PARTNERS as $key => $partners) {
            $partner = new Partner();
            $partner->setName($partners['name']);
            $partner->setPicture($partners['picture']);
            $partner->setLink($partners['link']);
            $manager->persist($partner);
        }
        $manager->flush();
    }*/
}
