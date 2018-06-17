<?php
/**
 * Created by PhpStorm.
 * User: botondev
 * Date: 2018.06.17.
 * Time: 15:18
 */

namespace Blog\AdminBundle\Controller;


use Blog\ModelBundle\Entity\Tag;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class TagController
 * @package Blog\AdminBundle\Controller
 *
 * @Route("tag")
 */
class TagController extends Controller
{
    /**
     * List all tag entities
     *
     * @Route("/")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $tags = $em->getRepository('ModelBundle:Tag')->findAll();

        return array(
            'tags' => $tags
        );
    }

    /**
     * Create a new Tag entity
     *
     * @Route("/new")
     * @Method({"GET", "POST"})
     * @Template()
     */
    public function newAction(Request $request)
    {
        $tag = new Tag();
        $form = $this->createForm('Blog\ModelBundle\Form\TagType', $tag);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid())
        {
            $em = $this->getDoctrine()->getManager();
            $em->persist($tag);
            $em->flush();

            return $this->redirectToRoute('blog_admin_tag_index');
        }

        return array(
            'tag' => $tag,
            'form' => $form->createView()
        );
    }

    /**
     * @Route("/{id}/edit")
     * @Method({"GET", "POST"})
     * @Template()
     * @param Request $request
     * @param Tag $tag
     * @return array|\Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function editAction(Request $request, Tag $tag)
    {
        $deleteForm = $this->createDeleteForm($tag);
        $editForm = $this->createForm('Blog\ModelBundle\Form\TagType', $tag);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid())
        {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('blog_admin_tag_edit',
                array('id' => $tag->getId()));
        }

        return array(
            'tag' => $tag,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView()
        );
    }

    /**
     * Deletes a tag entity
     *
     * @Route("/{id}")
     * @Method("DELETE")
     *
     * @param Request $request
     * @param Tag $tag
     *
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function deleteAction(Request $request, Tag $tag)
    {
        $form = $this->createDeleteForm($tag);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid())
        {
            $em = $this->getDoctrine()->getManager();
            $em->remove($tag);
            $em->flush();
        }

        return $this->redirectToRoute('blog_admin_tag_index');
    }

    /**
     * Creates a form to delete a Tag entity
     *
     * @param Tag $tag
     * @return \Symfony\Component\Form\Form|\Symfony\Component\Form\FormInterface The form
     */
    private function createDeleteForm(Tag $tag)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('blog_admin_tag_delete', array('id' => $tag->getId())),
                array('id' => $tag->getId()))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}