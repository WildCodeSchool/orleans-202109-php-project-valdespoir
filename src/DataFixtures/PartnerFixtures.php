<?php

namespace App\DataFixtures;

use App\Entity\Partner;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class PartnerFixtures extends Fixture
{
    public const PARTNERS = [
        [
            'name' => 'Région Centre Val de Loire',
            'picture' => 'https://www.tiralarc-centrevaldeloire.fr/media/uploaded/s
        ites/12275/partenaire/58efe73576307_LogoRegionCentreValdeloire.jpg',
            'link' => 'https://www.centre-valdeloire.fr/'
        ],
        [
            'name' => 'Agglomération Orléans',
            'picture' => 'https://upload.wikimedia.org/wikipedia/fr/d/dd/Agglo_orl%C3%A9ans.jpg',
            'link' => 'https://www.orleans-metropole.fr/'
        ],
        [
            'name' => 'Conseil Départementale',
            'picture' => 'https://upload.wikimedia.org/wikipedia/fr/e/e0/Loiret_logo.jpg',
            'link' => 'https://www.loiret.fr/'
        ],
    ];
    public function load(ObjectManager $manager): void
    {
        foreach (self::PARTNERS as $partners) {
            $partner = new Partner();
            $partner->setName($partners['name']);
            $partner->setPictureFile($partners['picture']);
            $partner->setLink($partners['link']);
            $manager->persist($partner);
        }
        $manager->flush();
    }
}
