<?php
/**
 * Created by PhpStorm.
 * User: botondev
 * Date: 2018.05.27.
 * Time: 19:59
 */

namespace Blog\ModelBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Tag
 *
 * @ORM\Table(name="tag")
 * @ORM\Entity(repositoryClass="Blog\ModelBundle\Repository\TagRepository")
 */
class Tag
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var ArrayCollection
     * @ORM\ManyToMany(targetEntity="Post", mappedBy="tags")
     */
    private $posts;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=150)
     * @Assert\NotBlank
     */
    private $name;

    public function __construct()
    {
        $this->posts = new ArrayCollection();
    }

    public function addArticle(Post $post)
    {
        $this->posts[] = $post;
        return $this;
    }

    public function setName($name) {
        $this->name = $name;
        return $this;
    }

    public function getName() {
        return $this->name;
    }

    public function __toString()
    {
        return $this->name;
    }
}