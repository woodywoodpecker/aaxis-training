<?php

namespace Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;

class DefaultController
{
    /**
     * @Route("/hello-symfony")
     * @return Response
     */
    public function indexAction()
    {
        return new Response('hello Symfony!');
    }
}
