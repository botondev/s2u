<?php
/**
 * Created by PhpStorm.
 * User: botondev
 * Date: 2018.06.09.
 * Time: 21:44
 */

namespace  Blog\ModelBundle\Repository;

/**
 * Class TagRepository
 * @package Blog\ModelBundle\Repository
 */
class TagRepository extends \Doctrine\ORM\EntityRepository
{
    /**
     * @return array
     */
    public function findUsedTags()
    {
        $em = $this->getEntityManager();
        $usedTags =  $em
            ->createQuery('SELECT DISTINCT t FROM ModelBundle:Tag t WHERE SIZE(t.posts) > 0')
            ->getResult();

        return $usedTags;
    }

}