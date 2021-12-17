<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker;

class SiteFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
            //$manager->persist($site);

            //$manager->flush();
        }
    }

