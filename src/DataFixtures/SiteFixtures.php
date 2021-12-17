<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;
use App\Entity\Site;

class SiteFixtures extends Fixture
{
    public const SITE_NUMBER = 10;
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
