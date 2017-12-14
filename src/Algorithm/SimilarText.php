<?php declare(strict_types=1);

namespace Olevv\SimilarityStrings\Algorithm;

/**
 * Class SimilarText
 * @package Olevv\SimilarityStrings\Algorithm
 */
final class SimilarText implements AlgorithmInterface
{
    /**
     * @param string $one
     * @param string $two
     * @return float
     */
    public function calculate(string $one, string $two): float
    {
        similar_text($one, $two, $percent);

        return (float)$percent/100;
    }
}
