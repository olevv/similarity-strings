<?php declare(strict_types=1);

namespace Olevv\SimilarityStrings\Algorithm;

/**
 * Class SimilarText
 * @package Olevv\SimilarityStrings\Algorithm
 */
final class SimilarText implements AlgorithmInterface
{
    /**
     * @param string $strOne
     * @param string $strTwo
     * @return float
     */
    public function calculate(string $strOne, string $strTwo): float
    {
        similar_text($strOne, $strTwo, $percent);

        return (float)round($percent, 2);
    }
}
