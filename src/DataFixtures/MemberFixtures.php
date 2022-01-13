<?php

namespace App\DataFixtures;

use App\Entity\Member;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class MemberFixtures extends Fixture
{
    public const MEMBER_NUMBER = 7;

    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create('fr_FR');
        for ($i = 0; $i < self::MEMBER_NUMBER; $i++) {
            $member = new Member();
            $member->setName($faker->fullname());
            $member->setRole($faker->jobTitle());
            $member->setDescription($faker->text(500));
            $manager->persist($member);
        }

        $manager->flush();
    }
}
