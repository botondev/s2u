<?php

namespace AppBundle\Controller;

use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\Category;
use AppBundle\Entity\Product;
use Symfony\Component\HttpFoundation\Response;
use AppBundle\Entity\Task;
use AppBundle\Form\TaskType;

class DefaultController extends Controller
{
    /**
     * @param Request $request
     * @return Response
     * @Route("/new/task/")
     */
    public function newTaskAction(Request $request)
    {
        // creates a task and gives it some dummy data for this example
        $task = new Task();
        $task->setTask('Write a blog post');
        $task->setDueDate(new \DateTime('tomorrow'));

        $form = $this->createForm('AppBundle\Form\TaskType', $task);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // $form->getData() holds the submitted values
            // but, the original `$task` variable has also been updated
            $task = $form->getData();

            // ... perform some action, such as saving the task to the database
            // for example, if Task is a Doctrine entity, save it!
            // $entityManager = $this->getDoctrine()->getManager();
            // $entityManager->persist($task);
            // $entityManager->flush();

            return $this->redirectToRoute('task_success');
        }

        return $this->render('default/newTask.html.twig', array(
            'form' => $form->createView()
        ));
    }

    /**
     * @Route("/admin/")
     *
     * @return Response
     */
    public function adminAction()
    {
        return new Response('<html><body>Admin page!</body></html>');
    }

    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('default/index.html.twig', array(
            'base_dir' => realpath($this->container->getParameter('kernel.root_dir').'/..').DIRECTORY_SEPARATOR,
        ));
    }

    /**
     * @Route("/create_product/", name="createProduct")
     */
    public function createProductAction()
    {
        $category = new Category();
        $category->setName('Computer Peripherials');

        $product = new Product();
        $product->setName('Keyboard');
        $product->setPrice(19.99);
        $product->setDescription('Ergonomic and stylish');

        // relates this product to the category
        $product->setCategory($category);

        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->persist($category);
        $entityManager->persist($product);
        $entityManager->flush();

        return new Response(
            'Saved new product with id: '.$product->getId()
            .' and new category with id: '.$category->getId()
        );
    }

    /**
     * @Route("/show_product/{productId}/", name="showProduct")
     */
    public function showAction($productId)
    {
        // lazy loaded
//        $product = $this->getDoctrine()
//            ->getRepository('\AppBundle\Entity\Product')
//            ->find($productId);

        $product = $this->getDoctrine()
            ->getRepository('\AppBundle\Entity\Product')
            ->findOneByIdJoinedToCategory($productId);

        $categoryName = $product->getCategory()->getName();

        return new Response('category name is '.$categoryName);
    }

    /**
     * @Route("/show_products/{categoryId}/", name="showProducts")
     */
    public function showProductsAction($categoryId)
    {
        $category = $this->getDoctrine()
            ->getRepository('\AppBundle\Entity\Category')
            ->find($categoryId);

        $products = $category->getProducts();

        $dummy = new Category();
        $dummy->setName('dummy yeah ?');

        // TODO: it does not converts objects to json, only primitive types
        return new JsonResponse($dummy);
    }
}
