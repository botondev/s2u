<?php

namespace Blog\CoreBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class PostController extends Controller
{
    /**
     * @Route("/")
     * @Template()
     */
    public function indexAction()
    {
//        return $this->render('CoreBundle:Post:index.html.twig', array(
//            // ...
//        ));

        $posts = $this
            ->getDoctrine()
            ->getRepository('ModelBundle:Post')
            ->findAll();

        $latestPosts = $this->getDoctrine()
            ->getRepository('ModelBundle:Post')
            ->findLatest(5);

        return array(
            'posts' => $posts,
            'latestPosts' => $latestPosts
        );
    }

}
