<?php declare(strict_types=1);

namespace Olevv\SimilarityStrings\Algorithm;

/**
 * Interface AlgorithmInterface
 * @package Olevv\SimilarityStrings\Algorithm
 */
interface AlgorithmInterface
{
    /**
     * @param string $one
     * @param string $two
     * @return float
     */
    public function calculate(string $one, string $two): float;
}
