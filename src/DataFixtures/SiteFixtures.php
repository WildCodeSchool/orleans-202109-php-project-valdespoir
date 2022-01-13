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
            $site->setAfterPicture($faker->imageUrl(640, 480, 'animals', true));
            $site->setBeforePicture($faker->imageUrl(640, 480, 'animals', true));
            copy(__DIR__ . '/haie2.JPG', '../../public/uploads/images/haie2.JPG');
            $manager->persist($site);
        }
        $manager->flush();
    }
}
