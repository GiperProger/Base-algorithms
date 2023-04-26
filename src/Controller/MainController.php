<?php

namespace App\Controller;

use Exception;
use phpDocumentor\Reflection\Types\This;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MainController extends AbstractController
{
    /**
     * @Route("/")
     * @Route("/index")
     */
    public function index(): Response
    {
        return $this->render('main/index.html.twig');
    }
}