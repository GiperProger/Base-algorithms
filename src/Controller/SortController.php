<?php

namespace App\Controller;

use App\services\SortService;
use phpDocumentor\Reflection\Types\This;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class SortController extends AbstractController
{
    /**
     * @var SortService
     */
    protected $sortService;

    public function __construct(SortService $sortService)
    {
        $this->sortService = $sortService;
    }

    /**
     * @Route("/sort/insertion", name="sort_insertion")
     * @return Response
     */
    public function insertionSort(): Response
    {
        $elementsToSort = range(1, 10);
        shuffle($elementsToSort);

        $sorted = $this->sortService->insertionSort($elementsToSort, false);

        return $this->render('sorts/insertion.html.twig', [
            'toSort' => $elementsToSort,
            'sorted' => $sorted
        ]);
    }

    /**
     * @Route("/sort/selection", name="sort_selection")
     * @return Response
     */
    public function selectionSort(): Response
    {
        $elementsToSort = range(1, 10);
        shuffle($elementsToSort);

        $sorted = $this->sortService->selectionSort($elementsToSort, false);

        return $this->render('sorts/selection.html.twig', [
            'toSort' => $elementsToSort,
            'sorted' => $sorted
        ]);
    }

    /**
     * @Route("/sort/merge", name="sort_merge")
     * @return Response
     */
    public function mergeSort(): Response
    {
        $elementsToSort = range(1, 10);
        shuffle($elementsToSort);
        $sorted = $this->sortService->mergeSort($elementsToSort, true);

        return $this->render('sorts/selection.html.twig', [
            'toSort' => $elementsToSort,
            'sorted' => $sorted
        ]);
    }

    /**
     * @Route("/sort/general", name="general")
     * @return Response
     */
    public function general()
    {

        $a = str_split(decbin(800));
        $b = str_split(decbin(121));
        $result = [];

        $biggestArray = count($a) > count($b) ? $a : $b;
        $smallestArray = count($a) < count($b) ? $a : $b;

        $carry = 0;


        while (count($biggestArray) > 0) {
            $sum = ((int)array_pop($biggestArray) + (int)array_pop($smallestArray)) + $carry;

            $carry = 0;

            if($sum >= 2){
                $sum -=2;
                $carry = 1;
            }

            array_unshift($result, $sum);

        }

        if($carry == 1){
            array_unshift($result, 1);
        }


        dump(bindec(implode("",$result)));
        exit;




    }
}