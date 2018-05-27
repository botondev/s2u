<?php
/**
 * Created by PhpStorm.
 * User: botondev
 * Date: 2018.05.27.
 * Time: 13:49
 */

namespace AppBundle\Entity;

use AppBundle\Entity\User as User;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="comment")
 */
class Comment
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="string")
     */
    private $id;

    /**
     * Bidirectional - Many comments are favorited by many users ( INVERSE SIDE )
     *
     * @ORM\ManyToMany(targetEntity="User", mappedBy="favorites")
     */
    private $userFavorites;

    /**
     * Bidirectional - Many Comments are authored by one user (OWNING SIDE)
     *
     * @ORM\ManyToOne(targetEntity="User", inversedBy="commentsAuthored")
     */
    private $author;

    public function setAuthor(User $author) {
        $this->author = $author;
    }

    public function addUserFavorite(User $user) {
        $this->userFavorites[] = $user;
    }

    public function removeUserFavorite(User $user) {
        $this->userFavorites-removeElement($user);
    }
}