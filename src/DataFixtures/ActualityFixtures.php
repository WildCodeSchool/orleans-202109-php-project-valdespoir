<?php

namespace App\DataFixtures;

use App\Entity\Actuality;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class ActualityFixtures extends Fixture
{
    public const ACTUALITY_NUMBER = 6;

    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create("fr_FR");
        for ($i = 0; $i < self::ACTUALITY_NUMBER; $i++) {
            $actuality = new Actuality();
            $actuality->setTitle($faker->city);
            $actuality->setShortdescription($faker->text(150));
            $actuality->setDescription($faker->text(500));
            $actuality->setDate($faker->dateTime());
            $actuality->setPicture($faker->imageUrl(640, 480, 'animals', true));
            $manager->persist($actuality);
        }
        $manager->flush();
    }
}
