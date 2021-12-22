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
        foreach (self::ASSOCIATION as $key => $associationManagerName) {
            $association = new Association();
            $association->setRole($associationManagerName['role']);
            $association->setName($associationManagerName['name']);
            $manager->persist($associationManagerName);
            $this->addReference('job_' . $key, $associationManagerName);
        }
        $manager->flush();
    }
}
