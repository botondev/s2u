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
 * @ORM\Entity
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

    public function addArticle(Article $post)
    {
        $this->posts[] = $post;
    }
}