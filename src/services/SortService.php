<?php

namespace App\services;

class SortService
{

    /**
     * @param array $elements
     * @param bool $asc
     * @return array
     */
    public function insertionSort(array $elements, bool $asc = true): array
    {
        $length = count($elements);

        if($length === 0 || $length === 1){
            return $elements;
        }

        for($j = 1; $j < $length; $j++){
            $key = $elements[$j];
            $i = $j - 1;

            while ($i >= 0 && $this->ascOrDesc($elements[$i], $key, $asc)){
                $elements[$i + 1] = $elements[$i];
                $i--;
            }

            $elements[$i + 1] = $key;
        }

        return $elements;
    }

    private function ascOrDesc($el1, $el2, $asc = true): bool
    {
        if($asc){
            return $el1 > $el2;
        }
        return $el1 < $el2;

    }


    /**
     * @param array $elementsToSort
     * @param bool $asc
     * @return array
     */
    public function selectionSort(array $elementsToSort, bool $asc = true): array
    {
        $i = 0;

        while ($i < count($elementsToSort)){
            $unsortedPart = array_slice($elementsToSort, $i);
            $delta = $asc ? min($unsortedPart) : max($unsortedPart);
            $minIndex = array_search($delta, $elementsToSort);

            $temp = $elementsToSort[$i];
            $elementsToSort[$i] = $delta;
            $elementsToSort[$minIndex] = $temp;
            $i++;
        }

        return $elementsToSort;

    }

    /**
     * @param array $left
     * @param array $right
     * @param $asc
     * @return array
     */
    private function merge(array $left, array $right, $asc): array
    {
        $sorted = [];

        while (count($left) > 0 && count($right) > 0 ){
            if($this->ascOrDesc($left[0], $right[0], $asc)){
                $sorted[] = array_shift($right);
            }else{
                $sorted[] = array_shift($left);
            }
        }

        return array_merge($sorted, $left, $right);
    }

    /**
     * @param array $elementsToSort
     * @param $asc
     * @return array
     */
    public function mergeSort(array $elementsToSort, $asc): array
    {
        if(count($elementsToSort) < 2){
            return $elementsToSort;
        }

        $center = (int)ceil(count($elementsToSort) / 2);

        $parts = array_chunk($elementsToSort, $center);

        return $this->merge($this->mergeSort($parts[0], $asc), $this->mergeSort($parts[1], $asc), $asc);

    }

}