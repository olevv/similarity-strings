<?php declare(strict_types=1);

namespace Olevv\SimilarityStrings\Algorithm;

/**
 * Class ThreeSets
 * @package Olevv\SimilarityStrings\Algorithm
 */
final class ThreeSets implements AlgorithmInterface
{
    const ALPHABET = 'abcdefghijklmnopqrstuvwxyz0123456789';

    /**
     * @param string $one
     * @param string $two
     * @return float
     */
    public function calculate(string $one, string $two): float
    {
        $hashCharOne = [];
        $one = (string)preg_replace('/[^a-z]/', '', $one);
        $charOne = count_chars($one, 1);
        foreach ($charOne as $key => $value) {
            $chr = \chr($key);
            $hashCharOne[$chr] = $value;
        }

        $hashCharTwo = [];
        $two = (string)preg_replace('/[^a-z]/', '', $two);
        $charTwo = count_chars($two, 1);
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

        $lengthTotal = \strlen($one) + \strlen($two);

        $percentSimilarity = 1 - $similarity / $lengthTotal;

        return (float)$percentSimilarity;
    }
}
