<?php

namespace Blog\ModelBundle\Repository;

use Blog\ModelBundle\Entity\User;

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

    /**
     * Find the first post
     *
     * @return Post
     * @throws \Doctrine\ORM\NoResultException
     * @throws \Doctrine\ORM\NonUniqueResultException
     */
    public function findFirst()
    {
        $qb = $this->getQueryBuilder()
            ->orderBy('p.id', 'asc')
            ->setMaxResults(1);
        return $qb->getQuery()->getSingleResult();
    }

    public function findByTagName($tagName) {
        $taggedPosts = $this->getQueryBuilder()
            ->innerJoin('p.tags', 't')
            ->where('t.name = :tagName')
            ->setParameter('tagName', $tagName)
            ->getQuery()
            ->getResult();

        return $taggedPosts;
    }

    /**
     * @var User $user
     * @return array
     */
    public function findByUser($user) {
        $userPosts = $this->getQueryBuilder()
            ->innerJoin('p.author', 'a')
            ->where('a.id = :authorId')
            ->setParameter('authorId', $user->getAuthor()->getId())
            ->getQuery()
            ->getResult();

        return $userPosts;
    }

    private function getQueryBuilder()
    {
        $em = $this->getEntityManager();

        $qb = $em->getRepository('ModelBundle:Post')
            ->createQueryBuilder('p');

        return $qb;
    }

}
