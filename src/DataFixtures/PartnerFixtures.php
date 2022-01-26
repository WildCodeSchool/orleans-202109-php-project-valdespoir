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
            'link' => 'https://www.centre-valdeloire.fr/'
        ],
        [
            'name' => 'Agglomération Orléans',
            'link' => 'https://www.orleans-metropole.fr/'
        ],
        [
            'name' => 'Conseil Départementale',
            'link' => 'https://www.loiret.fr/'
        ],
    ];
    public function load(ObjectManager $manager): void
    {
        foreach (self::PARTNERS as $partners) {
            $partner = new Partner();
            $partner->setName($partners['name']);
            $partner->setPicture('partner.jpeg');
            $partner->setLink($partners['link']);
            $manager->persist($partner);
            copy(__DIR__ . '/partner.jpeg', __DIR__ . '/../../public/uploads/images/partner.jpeg');
        }
        $manager->flush();
    }
}
