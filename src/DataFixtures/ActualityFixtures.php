<?php

namespace App\DataFixtures;

use App\Entity\Actuality;
use App\Kernel;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;

class ActualityFixtures extends Fixture
{
    public const ACTUALITY_NUMBER = 6;

    private Kernel $kernel;

    public function __construct(Kernel $kernel)
    {
        $this->kernel = $kernel;
    }

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
            copy(__DIR__ . '/haie2.jpg', $this->kernel->getProjectDir() . '/public/uploads/images/haie2.jpg');

            $manager->persist($actuality);
        }
        $manager->flush();
    }
}
