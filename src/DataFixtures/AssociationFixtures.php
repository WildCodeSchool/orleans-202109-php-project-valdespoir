<?php

namespace App\DataFixtures;

use App\Entity\Association;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AssociationFixtures extends Fixture
{
    public const ASSOCIATION = [
        [
            'role' => 'Role de la personne',
            'name' => 'Nom de la personne<br>'
        ],

    ];

    public function load(ObjectManager $manager)
    {
        foreach (self::ASSOCIATION as $key => $associationTitle) {
            $association = new Association();
            $association->setRole($associationTitle['role']);
            $association->setName($associationTitle['name']);
            $manager->persist($associationTitle);
            $this->addReference('job_' . $key, $associationTitle);
        }
        $manager->flush();
    }
}
