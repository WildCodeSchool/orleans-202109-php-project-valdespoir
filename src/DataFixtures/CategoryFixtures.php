<?php

namespace App\DataFixtures;

use App\Entity\Category;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class CategoryFixtures extends Fixture
{
    public const CATEGORIES = [
        'Partenaire Social',
        'Partenaire Institutionnel',
        'Partenaire Financier'
    ];

    public function load(ObjectManager $manager)
    {
        foreach (self::CATEGORIES as $key => $name) {
            $category = new Category();
            $category->setName($name);
            $manager->persist($category);

            $this->addReference('category_' . $key, $category);
        }
        $manager->flush();
    }
}
