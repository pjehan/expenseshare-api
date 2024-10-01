<?php

namespace App\DataFixtures;

use App\Entity\Expense;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class ExpenseFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $tripToIceland = $this->getReference('event-trip-to-iceland');
        $johnsBirthday = $this->getReference('event-johns-birthday');
        $weekendInNice = $this->getReference('event-weekend-in-nice');

        $transport = $this->getReference('category-transport');
        $accommodation = $this->getReference('category-accommodation');
        $food = $this->getReference('category-food');
        $activity = $this->getReference('category-activity');
        $other = $this->getReference('category-other');

        $icelandAccommodation = new Expense();
        $icelandAccommodation->setTitle('Airbnb à Reykjavik');
        $icelandAccommodation->setUser('Paul');
        $icelandAccommodation->setAmount(250);
        $icelandAccommodation->setPaid(false);
        $icelandAccommodation->setCreatedAt((new \DateTimeImmutable())->sub(new \DateInterval('P5D')));
        $icelandAccommodation->setCategory($accommodation);
        $icelandAccommodation->setEvent($tripToIceland);
        $manager->persist($icelandAccommodation);

        $icelandCar = new Expense();
        $icelandCar->setTitle('Voiture de location');
        $icelandCar->setUser('Victor');
        $icelandCar->setAmount(150);
        $icelandCar->setPaid(false);
        $icelandCar->setCreatedAt((new \DateTimeImmutable())->sub(new \DateInterval('P8D')));
        $icelandCar->setCategory($transport);
        $icelandCar->setEvent($tripToIceland);
        $manager->persist($icelandCar);

        $icelandShopping = new Expense();
        $icelandShopping->setTitle('Supermarché premier jour');
        $icelandShopping->setUser('Victor');
        $icelandShopping->setAmount(93);
        $icelandShopping->setPaid(true);
        $icelandShopping->setCreatedAt((new \DateTimeImmutable())->sub(new \DateInterval('P2D')));
        $icelandShopping->setCategory($food);
        $icelandShopping->setEvent($tripToIceland);
        $manager->persist($icelandShopping);

        $niceBus = new Expense();
        $niceBus->setTitle('Tickets de bus');
        $niceBus->setUser('Antoine');
        $niceBus->setAmount(45);
        $niceBus->setPaid(true);
        $niceBus->setCreatedAt((new \DateTimeImmutable())->sub(new \DateInterval('P15D')));
        $niceBus->setCategory($transport);
        $niceBus->setEvent($weekendInNice);
        $manager->persist($niceBus);

        $manager->flush();
    }
}