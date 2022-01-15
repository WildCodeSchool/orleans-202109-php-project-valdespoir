<?php

namespace App\DataFixtures;

use App\Entity\Site;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class SiteFixtures extends Fixture
{
    public const SITE_NUMBER = 16;

    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create("fr_FR");
        for ($i = 0; $i < self::SITE_NUMBER; $i++) {
            $site = new Site();
            $site->setTitle($faker->city);
            $site->setCity($faker->city);
            $site->setDescription($faker->text(500));
            $site->setAfterPicture('haie2.jpg');
            $site->setBeforePicture('haie2.jpg');
            copy(__DIR__ . '/haie2.jpg', __DIR__ . '/../../public/uploads/images/haie2.jpg');

            $manager->persist($site);
        }
        $manager->flush();
    }
}
