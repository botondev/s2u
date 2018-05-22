<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

use AppBundle\Entity\Category;
use AppBundle\Entity\Product;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends Controller
{
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
