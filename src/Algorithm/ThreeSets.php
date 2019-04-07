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
     * @param string $one
     * @param string $two
     * @return float
     */
    public function calculate(string $one, string $two): float
    {
        $lengthTotal = mb_strlen($one) + mb_strlen($two);

        if (0 === $lengthTotal) {
            return (float)0;
        }

        $hashCharOne = $this->getHashChar($one);

        $hashCharTwo = $this->getHashChar($two);

        $chars = preg_split('//', self::ALPHABET);

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

        $percentSimilarity = 1 - $similarity / $lengthTotal;

        return (float)$percentSimilarity;
    }

    /**
     * @param string $str
     * @return array
     */
    private function getHashChar(string $str): array
    {
        $hashChar = [];

        $two = preg_replace('/[^a-z]/', '', $str);
        $charTwo = count_chars($two, 1);

        foreach ($charTwo as $key => $value) {
            $chr = chr($key);
            $hashChar[$chr] = $value;
        }

        return $hashChar;
    }
}
