<?php

namespace App\DataFixtures;

use App\Entity\JobOffer;
use DateTime;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class JobOfferFixtures extends Fixture
{
    public const JOB_OFFER = 6;

    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create('fr_FR');
        for ($i = 0; $i < self::JOB_OFFER; $i++) {
            $jobOffer = new JobOffer();
            $jobOffer->setSelected($faker->boolean());
            $jobOffer->setTitle($faker->jobTitle());
            $jobOffer->setDescription($faker->text(500));
            $jobOffer->setDate(new DateTime());
            $manager->persist($jobOffer);
        }

        $manager->flush();
    }
}
