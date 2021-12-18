<?php

namespace App\DataFixtures;

use App\Entity\Site;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class SiteFixtures extends Fixture
{
    public const SITE_NUMBER = 12;

    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create("fr_FR");
        for ($i = 0; $i < self::SITE_NUMBER; $i++) {
            $site = new Site();
            $site->setTitle($faker->city);
            $manager->persist($site);
        }
        $manager->flush();
    }
}
