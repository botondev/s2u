<?php

namespace Blog\CoreBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class TagController extends Controller
{
    /**
     * @Route("/tags")
     */
    public function tagsAction()
    {
        return $this->render('CoreBundle:Tag:tags.html.twig', array(
            // ...
        ));
    }

    /**
     * @Route("taggedposts")
     */
    public function taggedPostsAction()
    {
        return $this->render('CoreBundle:Tag:tagged_posts.html.twig', array(
            // ...
        ));
    }

}
