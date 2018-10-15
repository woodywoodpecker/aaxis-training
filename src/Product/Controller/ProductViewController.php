<?php

namespace Product\Controller;

use Product\Model\Product;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;
use Twig\Environment;

class ProductViewController
{
    /** @var Environment */
    private $twig;

    public function __construct(Environment $twig)
    {
        $this->twig = $twig;
    }

    /**
     * @Route(path="/product/{sku}/{name}", name="product_view")
     *
     * @param string $sku
     * @param string $name
     * @return Response
     * @throws \Twig_Error_Loader
     * @throws \Twig_Error_Runtime
     * @throws \Twig_Error_Syntax
     */
    public function __invoke(string $sku, string $name): Response
    {
        $product = new Product();
        $product->name = $name;
        $product->sku = $sku;

        return new Response($this->twig->render('Product/view.html.twig', ['product' => $product]));
    }
}
