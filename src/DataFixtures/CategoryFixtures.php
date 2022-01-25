<?php

namespace App\DataFixtures;

use App\Entity\Category;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class CategoryFixtures extends Fixture
{
    public const CATEGORIES = [
        'social',
        'institutionnel',
        'financier'
    ];
    public function load(ObjectManager $manager)
    {
        foreach (self::CATEGORIES as $key => $categories) {
            $category = new Category();
            $category->setName($categories['name']);
            $category->setPartnerType($categories['partnerType']);
            $manager->persist($category);

            $this->addReference('category_' . $key, $category);
        }
        $manager->flush();
    }
}
