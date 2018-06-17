<?php

namespace Blog\CoreBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class AuthorController extends Controller
{
    /**
     * Show posts by Author
     *
     * @param string $slug
     *
     * @throws NotFoundHttpException
     * @return array
     *
     * @Route("/author/{slug}")
     * @Template()
     */
    public function showAction($slug)
    {
        $author = $this->getAuthorManager()->findBySlug($slug);
        $posts = $this->getAuthorManager()->findPosts($author);

        return array(
            'author' => $author,
            'posts' => $posts
        );
    }

    /**
     * Get Author manager
     *
     * @return AuthorManager
     */
    private function getAuthorManager()
    {
        return $this->get('authorManager');
    }

}
