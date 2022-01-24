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
            $actuality->setSelected($faker->boolean());
            $actuality->setTitle($faker->city);
            $actuality->setShortDescription($faker->text(100));
            $actuality->setDescription($faker->text(500));
            $actuality->setDate($faker->dateTime());
            $actuality->setPicture('haie2.jpg');
            copy(__DIR__ . '/haie2.jpg', __DIR__ . '/../../public/uploads/images/haie2.jpg');

            $manager->persist($actuality);
        }
        $manager->flush();
    }
}
