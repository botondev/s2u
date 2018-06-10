<?php

namespace Blog\CoreBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class TagController extends Controller
{
    /**
     * @Route("/tag/", name="tags")
     */
    public function tagsAction()
    {
        return $this->render('CoreBundle:Tag:tags.html.twig', array(
            // ...
        ));
    }

    /**
     * @Route("/tag/{tagName}/", name="tagged_posts")
     */
    public function taggedPostsAction($tagName)
    {
        $taggedPosts = $this->getDoctrine()->getRepository('ModelBundle:Post')
            ->findByTagName($tagName);

        return $this->render('CoreBundle:Tag:tagged_posts.html.twig', array(
            'taggedPosts' => $taggedPosts
        ));
    }

}
