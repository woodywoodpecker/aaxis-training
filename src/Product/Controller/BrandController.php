<?php

namespace Product\Controller;

use Oro\Bundle\ProductBundle\Entity\Brand;
use Psr\Log\LoggerInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class BrandController extends AbstractController
{
    /**
     * @Route("/brands/{count}",
     *     name="oro_product_brand_index",
     *     requirements={"count"="\d+"},
     *     defaults={"count"=10})
     */
    public function indexAction($count, LoggerInterface $logger)
    {
        if ($count < 1 || $count > 50) {
            $this->createNotFoundException('You can render from 1 to 50 products.');
        }

        $logger->error('{count} brands was requested', ['count' => $count]);

        $brands = $this->getDoctrine()->getRepository(Brand::class)->findBy([], [], $count);

        return $this->render('Brand/list.html.twig', ['brands' => $brands]);
    }
}
