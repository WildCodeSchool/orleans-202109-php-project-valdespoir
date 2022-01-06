<?php

namespace App\DataFixtures;

use App\Entity\Member;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class MemberFixtures extends Fixture
{
    public const Member_NUMBER = 6;        
            
    public function load(ObjectManager $manager): void 
    {
        $faker = Factory::create('fr_FR');
        for ($i = 0; $i < self::Member_NUMBER; $i++) {
            $Member = new Member();
            $Member->setName($faker->fullname());
            $Member->setRole($faker->memberRole());
            $manager->persist($Member);
        }
          
        $manager->flush();
    }
}
