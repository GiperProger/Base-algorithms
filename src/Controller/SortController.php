<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;


class SortController extends AbstractController
{
    /**
     * @Route("/sort/insertion", name="sort_insertion")
     * @return void
     */
    public function insertionSort()
    {
        var_dump(1234);
        exit;
    }
}