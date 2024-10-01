<?php

namespace App\DataFixtures;

use App\Entity\Category;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class CategoryFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $names = [
            'transport' => 'Transport',
            'accommodation' => 'Hébergement',
            'food' => 'Nourriture',
            'activity' => 'Activité',
            'other' => 'Autre'
        ];

        foreach ($names as $key => $name) {
            $category = new Category();
            $category->setName($name);
            $manager->persist($category);
            $this->addReference("category-$key", $category);
        }

        $manager->flush();
    }
}