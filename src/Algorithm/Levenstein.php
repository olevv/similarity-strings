<?php declare(strict_types=1);

namespace Olevv\SimilarityStrings\Algorithm;

/**
 * Class Levenstein
 * @package Olevv\SimilarityStrings\Algorithm
 */
final class Levenstein implements AlgorithmInterface
{

    /**
     * @param string $one
     * @param string $two
     * @return float
     */
    public function calculate(string $one, string $two): float
    {
        $length = max(mb_strlen($one), mb_strlen($two));

        $value = levenshtein($one, $two);

        return (float)0 === $length ? 0 : 1 - $value / $length;
    }
}
