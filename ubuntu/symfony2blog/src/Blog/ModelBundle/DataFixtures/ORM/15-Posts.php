<?php
/**
 * Created by PhpStorm.
 * User: botondev
 * Date: 2018.05.21.
 * Time: 22:17
 */

namespace Blog\ModelBundle\DataFixtures\ORM;

use Blog\ModelBundle\Entity\Post;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Form\Tests\Fixtures\Author;

class Posts extends AbstractFixture implements OrderedFixtureInterface
{
    public function getOrder()
    {
        return 15;
    }

    public function load(ObjectManager $manager)
    {
        $p1 = new Post();
        $p1->setTitle('Lorem ipusm dolor sit amet');
        $p1->setBody('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent vitae ligula tincidunt sapien egestas vulputate vitae sed tortor.
         Sed sit amet massa quam. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.
         In sit amet dapibus mauris. Cras eros justo, pretium rutrum purus a, imperdiet ultrices diam. Etiam varius, orci vel congue viverra, elit neque accumsan sem, 
         lobortis dignissim nisi dui tempus massa. Aenean nec eros faucibus, auctor diam ornare, cursus eros. Integer a ex vel purus dictum placerat. Maecenas tellus quam, 
         accumsan ut mi et, commodo faucibus massa. Fusce vulputate magna vel nunc suscipit elementum at sed est. Nam nec dui pellentesque, vehicula dolor vitae, 
         suscipit lectus. Fusce quis fringilla metus.

Aliquam felis risus, venenatis pulvinar massa in, sodales interdum ante. Donec at porta arcu. Duis tristique est eu tellus imperdiet, a tempor tellus tristique.
 In ac dui et metus congue pharetra vitae eu nisi. Pellentesque venenatis aliquam nulla, et tempus nibh blandit vel. Vestibulum laoreet ut enim eu feugiat. 
 Curabitur ultricies auctor sem, sit amet ornare justo laoreet in. Morbi a risus pulvinar, dignissim erat ac, pulvinar elit. Phasellus ultrices auctor ipsum et ornare. 
 Vivamus a lectus auctor, porta nisi ut, blandit nunc. Cras non neque ipsum. Quisque massa metus, imperdiet nec vehicula eget, pretium ac purus.');
        $p1->setAuthor($this->getAuthor($manager, 'David'));

        $p2 = new Post();
        $p2->setTitle('Donec magna risus, rhoncus ut congue id');
        $p2->setBody('Donec magna risus, rhoncus ut congue id, interdum vitae turpis. Etiam vulputate tincidunt maximus. Interdum et malesuada fames ac ante ipsum 
        primis in faucibus. Sed gravida interdum justo iaculis accumsan. Phasellus in libero nec diam rhoncus fermentum. Sed dapibus, mi at ultricies tincidunt, 
        risus nulla tempus justo, non tristique neque massa id sem. Morbi sem odio, scelerisque vitae lectus eu, ultrices pretium leo. Vestibulum sagittis ante ut cursus commodo. 
        Cras fringilla justo in mollis hendrerit. Duis id egestas lectus. Quisque egestas libero at tincidunt accumsan. Maecenas rutrum non augue sit amet auctor.

Pellentesque lacinia justo commodo, vehicula nunc quis, fringilla libero. Ut eget eleifend mauris. Pellentesque at augue non massa hendrerit mattis. Sed id dapibus nibh.
 Integer sit amet volutpat lacus. Morbi aliquam iaculis erat quis tempor. Integer aliquam, turpis at mattis lobortis, erat quam faucibus odio, quis rhoncus ipsum nunc ut justo. 
 Etiam pulvinar in dolor vehicula consequat. Etiam sapien arcu, molestie non lacinia vel, dignissim ac nunc. Cras aliquet, nisi eget venenatis pulvinar, elit eros cursus libero,
  eu dictum augue dolor eu erat. Phasellus et mauris fringilla, vestibulum est quis, faucibus ligula. Aliquam at euismod elit. Vestibulum iaculis dui id mollis vestibulum. 
  Suspendisse venenatis eleifend ligula, nec viverra mi. Phasellus bibendum arcu ac ante fermentum, in tincidunt mauris ornare. Nulla nibh ipsum, congue at fringilla a, 
  commodo eget lectus.');
        $p2->setAuthor($this->getAuthor($manager, 'Eddie'));

        $p3 = new Post();
        $p3->setTitle('Donec magna risus, rhoncus ut congue id');
        $p3->setBody('Praesent accumsan non orci at placerat. Maecenas nec finibus tortor. Sed molestie eget elit vel fringilla. Maecenas eu nunc quis est fermentum
         consequat eget nec magna. Phasellus in diam nec erat pulvinar condimentum sit amet at odio. Sed ac viverra mauris. Aliquam cursus feugiat tortor semper consequat.
          Curabitur mattis ullamcorper metus eu blandit. Nulla velit nisi, fringilla sed augue id, sodales viverra sapien. Cras at luctus ante, et cursus nunc. Suspendisse
           condimentum tortor ut orci sollicitudin, eget tincidunt ipsum porttitor. Donec faucibus dui arcu, vel gravida neque iaculis in.

Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Vestibulum sed lacinia nulla. Nullam eget leo ornare libero pellentesque egestas ac ac risus.
 Nam sollicitudin urna vitae vestibulum molestie. Integer quis suscipit tellus, et blandit justo. Nunc ultricies nisi vitae tempus scelerisque. Maecenas arcu magna,
  molestie ut arcu quis, placerat luctus metus. Aliquam erat volutpat. Sed blandit tellus erat, non semper risus finibus ut. Nullam scelerisque orci vitae tortor dapibus,
   et suscipit mi finibus. Pellentesque eu tellus porttitor, rutrum arcu vitae, tincidunt neque. Duis euismod tellus aliquam, finibus urna ut, mattis metus.
    Nulla facilisis mauris ut lorem accumsan sagittis. Morbi et hendrerit ex. Sed ut porta felis, at ornare nulla. Curabitur fermentum odio varius ipsum blandit,
     aliquam malesuada tortor maximus.');
        $p3->setAuthor($this->getAuthor($manager, 'Eddie'));

        $manager->persist($p1);
        $manager->persist($p2);
        $manager->persist($p3);
        $manager->flush();
    }

    /**
     * Get an Author
     *
     * @param ObjectManager $manager
     * @param string $name
     *
     * @return Author
     */
    private function getAuthor(ObjectManager $manager, $name)
    {
        return $manager->getRepository('ModelBundle:Author')->findOneBy(
            array(
                'name' => $name
            )
        );
    }
}