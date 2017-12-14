<?php declare(strict_types=1);

namespace Olevv\SimilarityStrings\Algorithm;

/**
 * Class CosineDistance
 * @package Olevv\SimilarityStrings\Algorithm
 */
final class CosineDistance implements AlgorithmInterface
{
    /**
     * @param string $one
     * @param string $two
     * @return float
     */
    public function calculate(string $one, string $two): float
    {
        $tokensA = explode(' ', $one);
        $tokensB = explode(' ', $two);
        $dotProduct = $tokenA = $tokenB = 0;
        $uniqueTokensA = $uniqueTokensB = [];

        $uniqueMergedTokens =
            array_diff(
                array_unique(
                    array_merge($tokensA, $tokensB)
                ),
                ['']
            );

        foreach ($tokensA as $token) {
            $uniqueTokensA[$token] = 0;
        }
        foreach ($tokensB as $token) {
            $uniqueTokensB[$token] = 0;
        }

        foreach ($uniqueMergedTokens as $token) {
            $x = isset($uniqueTokensA[$token]) ? 1 : 0;
            $y = isset($uniqueTokensB[$token]) ? 1 : 0;
            $dotProduct += $x * $y;
            $tokenA += $x;
            $tokenB += $y;
        }

        $similarity = $tokenA * $tokenB !== 0 ? $dotProduct / sqrt($tokenA * $tokenB) : 0;

        return (float)$similarity;
    }
}
