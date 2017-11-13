<?php declare(strict_types=1);

namespace Olevv\SimilarityStrings\Algorithm;

interface CompositeAlgorithmInterface extends AlgorithmInterface
{
    public function addAlgorithm(AlgorithmInterface $algorithm) :void;
}
