<?php

/**
 * Created by PhpStorm.
 * User: botondev
 * Date: 2018.05.21.
 * Time: 22:08
 */

namespace Blog\ModelBundle\DataFixtures\ORM;

use Blog\ModelBundle\Entity\Author;
use Blog\ModelBundle\Entity\User;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

class Authors extends AbstractFixture implements OrderedFixtureInterface, ContainerAwareInterface
{
    /**
     * @var ContainerInterface
     */
    private $container;

    public function setContainer(ContainerInterface $container = null)
    {
        $this->container = $container;
    }

    /**
     * {@inheritdoc}
     */
    public function getOrder()
    {
        return 10;
    }

    /**
     * {@inheritdoc}
     */
    public function load(ObjectManager $manager)
    {
        $userManager = $this->container->get('fos_user.user_manager');
        /** @var \Blog\ModelBundle\Entity\User $u1*/
        $u1 = $userManager->createUser();
        $u1->setUsername('David');
        $u1->addRole('ROLE_AUTHOR');
        $u1->setEmail('david@gmail.com');
        $u1->setPlainPassword('david');
        $u1->setEnabled(true);
        $a1 = new Author();
        $a1->setName($u1->getUsername());
        $u1->setAuthor($a1);


        /** @var \Blog\ModelBundle\Entity\User $u2 */
        $u2 = $userManager->createUser();
        $u2->setUsername('Eddie');
        $u2->addRole('ROLE_AUTHOR');
        $u2->setEmail('eddie@gmail.com');
        $u2->setPlainPassword('eddie');
        $u2->setEnabled(true);
        $a2 = new Author();
        $a2->setName($u2->getUsername());
        $u2->setAuthor($a2);

        /** @var \Blog\ModelBundle\Entity\User $u3 */
        $u3 = $userManager->createUser();
        $u3->setUsername('Elsa');
        $u3->addRole('ROLE_AUTHOR');
        $u3->setEmail('elsa@gmail.com');
        $u3->setPlainPassword('elsa');
        $u3->setEnabled(true);
        $a3 = new Author();
        $a3->setName($u3->getUsername());
        $u3->setAuthor($a3);

        $admin = $userManager->createUser();
        /** @var \Blog\ModelBundle\Entity\User $admin*/
        $admin->setUsername('admin');
        $admin->addRole('ROLE_ADMIN');
        $admin->setEmail('admin@gmail.com');
        $admin->setPlainPassword('admin');
        $admin->setEnabled(true);

        $superAdmin = $userManager->createUser();
        /** @var \Blog\ModelBundle\Entity\User $superAdmin*/
        $superAdmin->setUsername('superadmin');
        $superAdmin->addRole('ROLE_SUPER_ADMIN');
        $superAdmin->setEmail('superadmin@gmail.com');
        $superAdmin->setPlainPassword('superadmin');
        $superAdmin->setEnabled(true);

        /** @var \Blog\ModelBundle\Entity\User $botondev */
        $botondev = $userManager->createUser();
        $botondev->setUsername('botondev');
        $botondev->addRole('ROLE_SUPER_ADMIN');
        $botondev->setEmail('superadmin@botondev.com');
        $botondev->setPlainPassword('botondev');
        $botondev->setEnabled(true);
        $a4 = new Author();
        $a4->setName($botondev->getUsername());
        $botondev->setAuthor($a4);


        $userManager->updateUser($u1);
        $userManager->updateUser($u2);
        $userManager->updateUser($u3);
        $userManager->updateUser($admin);
        $userManager->updateUser($superAdmin);
        $userManager->updateUser($botondev);
//        $manager->persist($a1);
//        $manager->persist($a2);
//        $manager->persist($a3);
//
//        $manager->flush();
    }

}