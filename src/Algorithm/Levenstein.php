<?php declare(strict_types=1);

namespace Olevv\SimilarityStrings\Algorithm;

/**
 * Class Levenstein
 * @package Olevv\SimilarityStrings\Algorithm
 */
final class Levenstein implements AlgorithmInterface
{

    /**
     * @param string $strOne
     * @param string $strTwo
     * @return float
     */
    public function calculate(string $strOne, string $strTwo): float
    {
        $length = max(mb_strlen($strOne), mb_strlen($strTwo));

        $value = levenshtein($strOne, $strTwo);

        return (float)round((0 === $length ? 0 : 1 - $value / $length) * 100, 2);
    }
}
