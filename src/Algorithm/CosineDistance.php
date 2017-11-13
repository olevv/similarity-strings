<?php declare(strict_types=1);

namespace Olevv\SimilarityStrings\Algorithm;

/**
 * Class CosineDistance
 * @package Olevv\SimilarityStrings\Algorithm
 */
final class CosineDistance extends ExtractClass implements AlgorithmInterface
{
    /**
     * @param string $strOne
     * @param string $strTwo
     * @return \Generator
     */
    public function calculate(string $strOne, string $strTwo): \Generator
    {
        $tokensA = explode(' ', $strOne);
        $tokensB = explode(' ', $strTwo);
        $a = $b = $c = 0;
        $uniqueTokensA = $uniqueTokensB = [];

        $uniqueMergedTokens = array_diff(array_unique(array_merge($tokensA, $tokensB)), ['']);

        foreach ($tokensA as $token) {
            $uniqueTokensA[$token] = 0;
        }
        foreach ($tokensB as $token) {
            $uniqueTokensB[$token] = 0;
        }

        foreach ($uniqueMergedTokens as $token) {
            $x = isset($uniqueTokensA[$token]) ? 1 : 0;
            $y = isset($uniqueTokensB[$token]) ? 1 : 0;
            $a += $x * $y;
            $b += $x;
            $c += $y;
        }

        $algorithmName = $this->getAlgorithmName((string)get_class());

        yield $algorithmName => (float)round(($b * $c != 0 ? $a / sqrt($b * $c) : 0) * 100, 2);
    }
}
