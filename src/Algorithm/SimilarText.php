<?php declare(strict_types=1);

namespace Olevv\SimilarityStrings\Algorithm;

/**
 * Class SimilarText
 * @package Olevv\SimilarityStrings\Algorithm
 */
final class SimilarText extends ExtractClass implements AlgorithmInterface
{

    /**
     * @param string $strOne
     * @param string $strTwo
     * @return \Generator
     */
    public function calculate(string $strOne, string $strTwo): \Generator
    {
        $algorithmName = $this->getAlgorithmName((string)get_class());

        similar_text($strOne, $strTwo, $percent);

        yield $algorithmName => (float)round($percent, 2);
    }
}
