<?php

namespace Blog\ModelBundle\Repository;

class PostRepository extends \Doctrine\ORM\EntityRepository
{
    /**
     * @param int $num How many posts to get
     *
     * @return array
     */
    public function findLatest($num)
    {
        $qb = $this->getQueryBuilder()
            ->orderBy('p.createdAt', 'desc')
            ->setMaxResults($num);

        return $qb->getQuery()->getResult();
    }

    private function getQueryBuilder()
    {
        $em = $this->getEntityManager();

        $gb = $em->getRepository('ModelBundle:Post')
            ->createQueryBuilder('p');

        return $gb;
    }

}
