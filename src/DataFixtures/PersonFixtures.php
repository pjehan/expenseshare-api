<?php

namespace App\DataFixtures;

use App\Entity\Person;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class PersonFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $tripToIceland = $this->getReference('event-trip-to-iceland');
        $johnsBirthday = $this->getReference('event-johns-birthday');
        $weekendInNice = $this->getReference('event-weekend-in-nice');

        $person1 = new Person();
        $person1->setFirstName('John');
        $person1->setLastName('Doe');
        $person1->setEvent($tripToIceland);
        $manager->persist($person1);
        $this->addReference('person-john-doe', $person1);

        $person2 = new Person();
        $person2->setFirstName('Jane');
        $person2->setLastName('Doe');
        $person2->setEvent($tripToIceland);
        $manager->persist($person2);
        $this->addReference('person-jane-doe', $person2);

        $person3 = new Person();
        $person3->setFirstName('Alice');
        $person3->setLastName('Smith');
        $person3->setEvent($weekendInNice);
        $manager->persist($person3);
        $this->addReference('person-alice-smith', $person3);

        $person4 = new Person();
        $person4->setFirstName('Bob');
        $person4->setLastName('Smith');
        $person4->setEvent($johnsBirthday);
        $manager->persist($person4);
        $this->addReference('person-bob-smith', $person4);

        $manager->flush();
    }

    public function getDependencies(): array
    {
        return [
            EventFixtures::class,
        ];
    }
}
