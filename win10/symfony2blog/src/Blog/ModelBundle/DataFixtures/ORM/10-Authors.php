<?php

namespace Blog\ModelBundle\DataFixtures\ORM;

use Blog\ModelBundle\Entity\Author;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;


class Authors extends AbstractFixture implements OrderedFixtureInterface
{
    public function getOrder()
    {
        return 10;
    }
    
    public function load(ObjectManager $manager)
    {
        $a1 = new Author();
        $a1->setName("David");
        
        $a2 = new Author();
        $a2->setName("Eddie");
        
        $a3 = new Author();
        $a3->setName("Elsa");

        $manager->persist($a1);
        $manager->persist($a2);
        $manager->persist($a3);

        $manager->flush();
    }
}