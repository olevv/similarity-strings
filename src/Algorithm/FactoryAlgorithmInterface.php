<?php declare(strict_types=1);

namespace Olevv\SimilarityStrings\Algorithm;

/**
 * Interface FactoryAlgorithmInterface
 * @package Olevv\SimilarityStrings\Algorithm
 */
interface FactoryAlgorithmInterface
{
    /**
     * @param string $preset
     * @return CompositeAlgorithmInterface
     */
    public function build(string $preset) :CompositeAlgorithmInterface;
}
