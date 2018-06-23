<?php

namespace Blog\CoreBundle\Controller;

use Blog\ModelBundle\Entity\Comment;
use Blog\ModelBundle\Entity\User;
use Blog\ModelBundle\Form\CommentType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class PostController
 *
 * @Route("/{_locale}", requirements={"en|es|hu"}, defaults={"_locale"="en"})
 */
class PostController extends Controller
{

    /**
     * @Route("/")
     * @Template()
     */
    public function indexAction()
    {
        $posts = $this->getPostManager()->findAll();

        $latestPosts = $this->getPostManager()->findLatest(5);


        $usedTags = $this->getDoctrine()
            ->getRepository('ModelBundle:Tag')
            ->findUsedTags();

        return array(
            'posts' => $posts,
            'latestPosts' => $latestPosts,
            'usedTags' => $usedTags
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
        /** @var User $user */
        $user = $this->getUser();
        $userName = null;
        if($user) {
            $userName = $user->getUsername();
        }

        $post = $this->getPostManager()->findBySlug($slug);
        $form = $this->createForm(new CommentType($userName));

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
     * @return array
     *
     * @Route("/{slug}/create-comment")
     * @Method("POST")
     * @Template("CoreBundle:Post:show.html.twig")
     */
    public function createCommentAction(Request $request, $slug)
    {
        $post = $this->getPostManager()->findBySlug($slug);
        $form = $this->getPostManager()->createComment($post, $request);

        if($form === true) {
            $this->get('session')->getFlashBag()->add('success', 'Your comment was submitted successfully');

            return $this->redirect(
                $this->generateUrl('blog_core_post_show',
                    array('slug' => $post->getSlug())
            ));
        }

        return array(
            'post' => $post,
            'form' => $form->createView()
        );
    }

    /**
     * Get Post manager
     *
     * @return PostManager
     */
    private function getPostManager()
    {
        return $this->get('postManager');
    }

}
