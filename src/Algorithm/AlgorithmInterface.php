<?php declare(strict_types=1);

namespace Olevv\SimilarityStrings\Algorithm;

/**
 * Interface AlgorithmInterface
 * @package Olevv\SimilarityStrings\Algorithm
 */
interface AlgorithmInterface
{
    /**
     * @param string $strOne
     * @param string $strTwo
     * @return float
     */
    public function calculate(string $strOne, string $strTwo): float;
}
