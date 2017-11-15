<?php declare(strict_types=1);

namespace Olevv\SimilarityStrings\Algorithm;

/**
 * Interface CompositeAlgorithmInterface
 * @package Olevv\SimilarityStrings\Algorithm
 */
interface CompositeAlgorithmInterface extends AlgorithmInterface
{
    /**
     * @param AlgorithmInterface $algorithm
     */
    public function addAlgorithm(AlgorithmInterface $algorithm) :void;
}
