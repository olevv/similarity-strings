<?php declare(strict_types=1);

namespace Olevv\SimilarityStrings\Algorithm;

use Generator;

/**
 * Class CompositeAlgorithm
 * @package Olevv\SimilarityStrings\Algorithm
 */
final class CompositeAlgorithm implements CompositeAlgorithmInterface
{
    /**
     * @var array
     */
    private $algorithms = [];

    /**
     * @param AlgorithmInterface $algorithm
     */
    public function addAlgorithm(AlgorithmInterface $algorithm): void
    {
        $this->algorithms[] = $algorithm;
    }

    /**
     * @param string $strOne
     * @param string $strTwo
     * @return Generator
     */
    public function calculate(string $strOne, string $strTwo): \Generator
    {
        foreach ($this->algorithms as $algorithm) {
              yield from $algorithm->calculate($strOne, $strTwo);
        }
    }
}
