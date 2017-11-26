<?php declare(strict_types=1);

namespace Olevv\SimilarityStrings\Algorithm;

/**
 * Class ThreeSets
 * @package Olevv\SimilarityStrings\Algorithm
 */
final class ThreeSets implements AlgorithmInterface
{
    private const ALPHABET = 'abcdefghijklmnopqrstuvwxyz0123456789';

    /**
     * @param string $strOne
     * @param string $strTwo
     * @return float
     */
    public function calculate(string $strOne, string $strTwo): float
    {
        $hashCharOne = [];
        $strOne = preg_replace('/[^a-z]/', '', $strOne);
        $charOne = count_chars($strOne, 1);
        foreach ($charOne as $key => $value) {
            $chr = \chr($key);
            $hashCharOne[$chr] = $value;
        }

        $hashCharTwo = [];
        $strTwo = preg_replace('/[^a-z]/', '', $strTwo);
        $charTwo = count_chars($strTwo, 1);
        foreach ($charTwo as $key => $value) {
            $chr = \chr($key);
            $hashCharTwo[$chr] = $value;
        };

        $chars = preg_split('//', static::ALPHABET);

        $similarity = 0;

        foreach ($chars as $char) {
            if ('' === $char) {
                continue;
            }

            $value = array_key_exists($char, $hashCharOne) ? $hashCharOne[$char] : '';
            $valueOne = empty($value) ? 0 : $value;

            $value = array_key_exists($char, $hashCharTwo) ? $hashCharTwo[$char] : '';
            $valueTwo = empty($value) ? 0 : $value;

            $similarity += abs($valueOne - $valueTwo);
        }

        $lengthTotal = \strlen($strOne) + \strlen($strTwo);

        $percentSimilarity = (1 - $similarity / $lengthTotal) * 100;

        return (float)round($percentSimilarity, 2);
    }
}
