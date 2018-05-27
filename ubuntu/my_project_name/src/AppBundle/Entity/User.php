<?php
/**
 * Created by PhpStorm.
 * User: botondev
 * Date: 2018.05.27.
 * Time: 13:12
 */

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="user")
 */
class User
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="string")
     */
    private $id;

    /**
     * Bidirectional - Many users have Many favorite comments (OWNING SIDE)
     *
     * @ORM\ManyToMany(targetEntity="Comment", inversedBy="userFavorites")
     * @ORM\JoinTable(name="user_favorite_comments")
     */
    private $favorites;

    /**
     * Unidirectional - Many users have marked many comments as read
     *
     * @ORM\ManyToMany(targetEntity="Comment")
     * @ORM\JoinTable(name="user_read_comments")
     */
    private $commentsRead;

    /**
     * Bidirectional - One-To-Many (INVERSE SIDE)
     *
     * @ORM\OneToMany(targetEntity="Comment", mappedBy="author")
     */
    private $commentsAuthored;

    /**
     * Unidirectional - Many-To-One
     *
     * @ORM\ManyToOne(targetEntity="Comment")
     */
    private  $firstComment;

    public function getReadComments() {
        return $this->commentsRead;
    }

    public function setFirstComment(Comment $c) {
        $this->firstComment = $c;
    }
}