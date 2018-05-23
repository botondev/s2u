<?php
/**
 * Created by PhpStorm.
 * User: botondev
 * Date: 2018.05.24.
 * Time: 0:52
 */

namespace App\DataFixtures;

use AppBundle\Entity\Product;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        // create 20 products! Bam! :D
        for ($i = 0; $i < 20; $i++) {
            $product = new Product();
            $product->setName('product'.$i);
            $product->setPrice(mt_rand(10, 100));
            $randomRating = mt_rand(0, 5);
            $product->setDescription(
                "This product has a rating of ${randomRating}/5.
                I bet you want it.");
            $manager->persist($product);
        }

        $manager->flush();
    }
}