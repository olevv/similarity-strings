<?php declare(strict_types=1);

namespace Olevv\SimilarityStrings\Algorithm;

/**
 * Class JaroWinkler
 * @package Olevv\SimilarityStrings\Algorithm
 */
final class JaroWinkler implements AlgorithmInterface
{

    /**
     * @param string $one
     * @param string $two
     * @return float
     */
    public function calculate(string $one, string $two): float
    {
        $scalingFactor = 0.1;

        $matching = 0;
        $transpositions = 0;
        $firstLength = \mb_strlen($one);
        $secondLength = \mb_strlen($two);

        $sflags = array_fill(0, $firstLength, false);
        $aflags = array_fill(0, $secondLength, false);
        $range = max(0, max($firstLength, $secondLength) / 2 - 1);

        if (!$firstLength || !$secondLength) {
            return 0.0;
        }

        foreach (range(0, $secondLength - 1) as $i) {
            for ($j = max($i - $range, 0), $length = min($i + $range + 1, $firstLength); $j < $length; $j++) {
                $i = (int)$i;
                $j = (int)$j;
                if (!$sflags[$j] && $two[$i] === $one[$j]) {
                    $sflags[$j] = true;
                    $aflags[$i] = true;
                    $matching++;
                    break;
                }
            }
        }

        if (!$matching) {
            return 0.0;
        }

        $length = 0;
        foreach (range(0, $secondLength - 1) as $i) {
            if (!$aflags[$i]) {
                continue;
            }
            for ($j = $length; $j < $firstLength; $j++) {
                if ($sflags[$j]) {
                    $length = $j + 1;
                    break;
                }
            }
            if ($one[$i] !== $two[$i]) {
                $transpositions++;
            }
        }
        $transpositions /= 2;

        $jaroDistance =
            (((float)$matching / $firstLength) +
                ((float)$matching / $secondLength) +
                ((float)($matching - $transpositions) / $matching)) / 3.0;

        $length = 0;
        $min = min(min($firstLength, $secondLength), 4);
        foreach (range(0, $min - 1) as $i) {
            if ($one[$i] === $two[$i]) {
                $length++;
            }
        }

        $jaroDistance += ($length * $scalingFactor * (1 - $jaroDistance));

        return (float)$jaroDistance;
    }
}
