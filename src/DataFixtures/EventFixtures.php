<?php

namespace App\DataFixtures;

use App\Entity\Event;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class EventFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $names = [
            'trip-to-iceland' => 'Voyage en Islande',
            'johns-birthday' => 'Anniversaire de John',
            'weekend-in-nice' => 'Weekend à Nice'
        ];

        foreach ($names as $key => $name) {
            $event = new Event();
            $event->setName($name);
            $manager->persist($event);
            $this->addReference("event-$key", $event);
        }

        $manager->flush();
    }
}