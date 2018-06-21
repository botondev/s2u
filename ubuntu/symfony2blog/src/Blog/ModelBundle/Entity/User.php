<?php
/**
 * Created by PhpStorm.
 * User: botondev
 * Date: 2018.06.19.
 * Time: 22:06
 */

namespace Blog\ModelBundle\Entity;

use FOS\UserBundle\Entity\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;
use Blog\ModelBundle\Entity\Author;

/**
 * @ORM\Entity
 * @ORM\Table(name="fos_user")
 */
class User extends BaseUser
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\ManyToMany(targetEntity="Blog\ModelBundle\Entity\Group")
     * @ORM\JoinTable(name="fos_user_user_group",
     *      joinColumns={@ORM\JoinColumn(name="user_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="group_id", referencedColumnName="id")}
     * )
     */
    protected $groups;

    /**
     * @var Author
     *
     * @ORM\OneToOne(targetEntity="Blog\ModelBundle\Entity\Author", inversedBy="user", cascade={"persist","remove"})
     * @ORM\JoinColumn(name="author_id", referencedColumnName="id")
     */
    protected $author;

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return \Blog\ModelBundle\Entity\Author
     */
    public function getAuthor()
    {
        return $this->author;
    }

    /**
     * @param \Blog\ModelBundle\Entity\Author $author
     */
    public function setAuthor($author)
    {
        $this->author = $author;
    }
}