<?php

namespace Blog\CoreBundle\Controller;

use Blog\ModelBundle\Entity\Comment;
use Blog\ModelBundle\Form\CommentType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\BrowserKit\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

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

    /**
     * Show a post
     *
     * @param string $slug
     *
     * @throws NotFoundHttpException
     * @return array
     *
     * @Route("/{slug}")
     * @Template()
     */
    public function showAction($slug)
    {
        $post = $this->getDoctrine()->getRepository('ModelBundle:Post')->findOneBy(
                array(
                    'slug' => $slug
                )
        );

        if ($post === null)
        {
            throw $this->createNotFoundException('Post was not found');
        }

        $form = $this->createForm(new CommentType());

        return array(
            'post' => $post,
            'form' => $form->createView()
        );

    }

    /**
     * Create comment
     *
     * @param Request $request
     * @param string $slug
     *
     * @throws NotFoundHttpException
     * @return array
     *
     * @Route("/{slug}/create-comment")
     * @Method("POST")
     * @Template("CoreBundle:Post:show.html.twig")
     */
    public function createCommentAction($slug)
    {
        $post = $this->getDoctrine()->getRepository('ModelBundle:Post')->findOneBy(
            array(
                'slug' => $slug
            )
        );

        if ($post === null) {
            throw $this->createNotFoundException('Post was not found');
        }

        $comment = new Comment();
        $comment->setPost($post);

        $form = $this->createForm(new CommentType(), $comment);
        $form->handleRequest($this->getRequest());

        if ($form->isValid()) {
            $this->getDoctrine()->getManager()->persist($comment);
            $this->getDoctrine()->getManager()->flush();

            $this->get('session')->getFlashBag()->add('success', 'Your comment was submitted successfully.');

            return $this->redirect($this->generateUrl('blog_core_post_show', array(
                'slug' => $post->getSlug()
            )));
        }

        return array(
            'post' => $post,
            'form' => $form->createView()
        );
    }

}
