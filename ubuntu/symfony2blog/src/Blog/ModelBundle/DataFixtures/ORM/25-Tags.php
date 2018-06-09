<?php
/**
 * Created by PhpStorm.
 * User: botondev
 * Date: 2018.06.09.
 * Time: 16:31
 */

namespace Blog\ModelBundle\DataFixtures\ORM;


use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Blog\ModelBundle\Entity\Tag;
use Blog\ModelBundle\Entity\Post;

class Tags extends AbstractFixture implements OrderedFixtureInterface
{

    /**
     * Get the order of this fixture
     *
     * @return integer
     */
    public function getOrder()
    {
        return 25;
    }

    /**
     * Load data fixtures with the passed EntityManager
     *
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        $posts = $manager->getRepository('ModelBundle:Post')->findAll();

        $tagNames = array(
            0 => "Lorem",
            1 => "Ipsum",
            2 => "Generated",
            3 => "Random1",
            4 => "Rambo",
            5 => "R2D2",
            6 => "The Force Be With You"
        );
        $postLastIndex = count($posts) - 1;
        foreach ($tagNames as $tagName) {
            $tag = new Tag();
            $tag->setName($tagName);
            $forNPost = random_int(1, $postLastIndex);
            for($i = 0; $i < $forNPost; $i++) {
                $selectedPost = random_int(0, $postLastIndex);
                $posts[$selectedPost]->addTag($tag);
            }
        }

        $manager->flush();
    }
}