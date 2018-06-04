<?php
/**
 * Created by PhpStorm.
 * User: botondev
 * Date: 2018.06.04.
 * Time: 22:09
 */

namespace Blog\ModelBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Blog\ModelBundle\Entity\Comment;

class Comments extends AbstractFixture implements OrderedFixtureInterface
{
    /**
     * {@inheritdoc}
     */
    public function getOrder()
    {
        return 20;
    }

    /**
     * {@inheritdoc}
     */
    public function load(ObjectManager $manager)
    {
        $posts = $manager->getRepository('ModelBundle:Post')->findAll();

        $comments = array(
            0 => "In nec orci risus. Proin non orci eu nisi feugiat pretium a id ligula. Mauris ut blandit est.
             Fusce vitae libero vulputate, ornare nulla id, mollis mauris. Ut tincidunt sapien leo, id dictum
              erat congue non. Vestibulum sit amet elementum eros, imperdiet scelerisque felis. Morbi quis
               hendrerit nisi. Maecenas ultricies, turpis et tempus ultrices, augue nibh vulputate tortor,
                et pellentesque augue odio ac purus. Mauris fringilla sed velit in vehicula. Sed sem dolor,
                 dignissim et elementum in, accumsan a ligula. Nam sit amet augue a mi varius vehicula at id
                  nibh.",
            1 => "Nam elit arcu, bibendum vel turpis at, sagittis elementum erat. Morbi rhoncus, lacus a varius
             lobortis, lectus magna suscipit enim, eu congue odio mauris sed justo. Praesent quis libero risus.
              In hac habitasse platea dictumst. In vitae quam ac lorem vestibulum cursus vel id lectus. 
              Etiam augue lectus, sagittis at nisl euismod, sagittis faucibus magna. Morbi neque ex, gravida 
              in nulla sit amet, tempor porta nisi. Mauris convallis lacus vel viverra suscipit. Phasellus dui 
              dolor, dapibus et est et, euismod iaculis nunc. Duis maximus metus in mauris tempor, at venenatis
               nisi consequat. Nunc vulputate posuere lacus ut ullamcorper. Etiam ornare libero id consequat 
               hendrerit. Quisque sagittis nibh vitae lacus auctor auctor. Pellentesque porttitor molestie 
               ornare. Ut sagittis ex velit, et placerat nisl tristique ac.",
            2 => "Donec eget arcu quis massa viverra convallis. Curabitur tempor auctor neque, a venenatis
             orci ullamcorper malesuada. Curabitur ac purus nisl. Fusce quis laoreet metus, et viverra ante.
              Maecenas ipsum mi, hendrerit non placerat sed, aliquam eget ligula. Nam ac congue metus. Proin 
              vestibulum nisi elit, id porta massa mollis ac. Quisque dapibus in mi at tincidunt. Donec ligula
               nisl, ornare nec tristique at, viverra sed lectus. Suspendisse feugiat pulvinar sem, non
                molestie sem cursus et. Integer ultricies id sapien non imperdiet. Integer in diam blandit
                 sapien vestibulum blandit sit amet nec mauris. Nulla dignissim tellus id vestibulum pharetra.
                  Donec sagittis cursus nisl eu elementum. In accumsan justo sed neque scelerisque, id aliquam
                   mauris eleifend."
        );

        $i = 0;

        foreach ($posts as $post) {
            $comment = new Comment();
            $comment->setAuthorName('Someone');
            $comment->setBody($comments[$i++]);
            $comment->setPost($post);

            $manager->persist($comment);
        }

        $manager->flush();
    }

}