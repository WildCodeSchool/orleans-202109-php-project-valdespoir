<?php

namespace App\DataFixtures;

use App\Entity\Site;
use App\Kernel;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;

class SiteFixtures extends Fixture
{
    public const SITE_NUMBER = 15;

    private Kernel $kernel;

    public function __construct(Kernel $kernel)
    {
        $this->kernel = $kernel;
    }

    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create("fr_FR");
        for ($i = 0; $i < self::SITE_NUMBER; $i++) {
            $site = new Site();
            $site->setSelected($faker->boolean());
            $site->setDate($faker->dateTime());
            $site->setTitle($faker->city);
            $site->setCity($faker->city);
            $site->setDescription($faker->text(500));
            $site->setAfterPicture('haie2.jpg');
            $site->setBeforePicture('haie2.jpg');
            copy(__DIR__ . '/haie2.jpg', $this->kernel->getProjectDir() . '/public/uploads/images/haie2.jpg');

            $manager->persist($site);
        }
        $manager->flush();
    }
}
