<?php declare(strict_types=1);

namespace Olevv\SimilarityStrings\Algorithm;

/**
 * Class Jaccard
 * @package Olevv\SimilarityStrings\Algorithm
 */
final class Jaccard implements AlgorithmInterface
{

    /**
     * @param string $one
     * @param string $two
     * @return float
     */
    public function calculate(string $one, string $two): float
    {
        $one = explode(' ', $one);
        $two = explode(' ', $two);

        $intersection = array_intersect($one, $two);

        $union = array_merge($one, $two);

        return (float)count($intersection) / count($union);
    }
}
