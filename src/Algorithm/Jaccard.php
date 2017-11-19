<?php declare(strict_types=1);

namespace Olevv\SimilarityStrings\Algorithm;

/**
 * Class Jaccard
 * @package Olevv\SimilarityStrings\Algorithm
 */
final class Jaccard implements AlgorithmInterface
{

    /**
     * @param string $strOne
     * @param string $strTwo
     * @return float
     */
    public function calculate(string $strOne, string $strTwo): float
    {
        $strOne = explode(' ', $strOne);
        $strTwo = explode(' ', $strTwo);

        $intersection = array_intersect($strOne, $strTwo);

        $union = array_merge($strOne, $strTwo);

        return (float)round((count($intersection) / count($union)) * 100, 2);
    }
}
