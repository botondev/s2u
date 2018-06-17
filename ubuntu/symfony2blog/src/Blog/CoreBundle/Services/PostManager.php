<?php
/**
 * Created by PhpStorm.
 * User: botondev
 * Date: 2018.06.17.
 * Time: 20:20
 */

namespace Blog\CoreBundle\Services;
use Doctrine\ORM\EntityManager;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

/**
 * Class PostManager
 */
class PostManager
{
    /**
     * @var EntityManager
     */
    private $em;

    public function __construct(EntityManager $em)
    {
        $this->em = $em;
    }

    /**
     * Find all posts
     *
     * @return array
     */
    public function findAll()
    {
        $posts = $this->em->getRepository('ModelBundle:Post')->findAll();

        return $posts;
    }

    /**
     * Find latest posts
     *
     * @param int $num
     *
     * @return array
     */
    public function findLatest($num)
    {
        $latestPosts = $this->em->getRepository('ModelBundle:Post')->findLatest($num);

        return $latestPosts;
    }

    /**
     * Find Post by slug
     *
     * @param $slug
     *
     * @throws NotFoundHttpException
     * @return Post
     */
    public function findBySlug($slug)
    {
        $post = $this->em->getRepository('ModelBundle:Post')->findOneBy(
            array(
                'slug' => $slug
            )
        );

        if ($post === null) {
            throw new NotFoundHttpException('Post was not found');
        }

        return $post;
    }


}