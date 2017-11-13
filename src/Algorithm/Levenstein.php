<?php declare(strict_types=1);

namespace Olevv\SimilarityStrings\Algorithm;

/**
 * Class Levenstein
 * @package Olevv\SimilarityStrings\Algorithm
 */
final class Levenstein extends ExtractClass implements AlgorithmInterface
{

    /**
     * @param string $strOne
     * @param string $strTwo
     * @return \Generator
     */
    public function calculate(string $strOne, string $strTwo): \Generator
    {
        $length = max(mb_strlen($strOne), mb_strlen($strTwo));

        $value = levenshtein($strOne, $strTwo);

        $algorithmName = $this->getAlgorithmName((string)get_class());

        yield $algorithmName => (float)round((0 === $length ? 0 : 1 - $value / $length) * 100, 2);
    }
}
