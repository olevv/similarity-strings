<?php declare(strict_types=1);

namespace Olevv\SimilarityStrings\Algorithm;

/**
 * Class Jaccard
 * @package Olevv\SimilarityStrings\Algorithm
 */
final class Jaccard extends ExtractClass implements AlgorithmInterface
{

    /**
     * @param string $strOne
     * @param string $strTwo
     * @return \Generator
     */
    public function calculate(string $strOne, string $strTwo): \Generator
    {
        $str1 = explode(' ', $strOne);
        $str2 = explode(' ', $strTwo);

        $intersection = array_intersect($str1, $str2);

        $union = array_merge($str1, $str2);

        $algorithmName = $this->getAlgorithmName((string)get_class());

        yield $algorithmName => (float)round((count($intersection) / count($union)) * 100, 2);
    }
}
