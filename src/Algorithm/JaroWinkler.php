<?php declare(strict_types=1);

namespace Olevv\SimilarityStrings\Algorithm;

/**
 * Class JaroWinkler
 * @package Olevv\SimilarityStrings\Algorithm
 */
final class JaroWinkler implements AlgorithmInterface
{
    private const SCALING_FACTOR = 0.1;

    /**
     * @var
     */
    private $matching;
    /**
     * @var
     */
    private $transpositions;
    /**
     * @var
     */
    private $firstLength;
    /**
     * @var
     */
    private $secondLength;
    /**
     * @var
     */
    private $firstFlags;
    /**
     * @var
     */
    private $secondFlags;
    /**
     * @var
     */
    private $range;
    /**
     * @var
     */
    private $length;

    /**
     * @param string $one
     * @param string $two
     * @return float
     */
    public function calculate(string $one, string $two): float
    {
        $this->matching = 0;
        $this->transpositions = 0;
        $this->firstLength = \mb_strlen($one);
        $this->secondLength = \mb_strlen($two);

        $this->firstFlags = array_fill(0, $this->firstLength, false);
        $this->secondFlags = array_fill(0, $this->secondLength, false);
        $this->range = max(0, max($this->firstLength, $this->secondLength) / 2 - 1);

        if (!$this->firstLength || !$this->secondLength) {
            return 0.0;
        }

        $this->calculateMatching($one, $two);

        if (!$this->matching) {
            return 0.0;
        }

        $this->length = 0;
        $this->calculateTranspositions($one, $two);

        return $this->calculateJaroDistance($one, $two);
    }

    /**
     * @param string $one
     * @param string $two
     */
    private function calculateMatching(string $one, string $two): void
    {
        foreach (range(0, $this->secondLength - 1) as $i) {
            for ($j = max($i - $this->range, 0),
                 $length = min($i + $this->range + 1, $this->firstLength); $j < $length; $j++) {
                $i = (int)$i;
                $j = (int)$j;
                if (!$this->firstFlags[$j] && $two[$i] === $one[$j]) {
                    $this->firstFlags[$j] = true;
                    $this->secondFlags[$i] = true;
                    $this->matching++;
                    break;
                }
            }
        }
    }

    /**
     * @param string $one
     * @param string $two
     */
    private function calculateTranspositions(string $one, string $two): void
    {
        foreach (range(0, $this->secondLength - 1) as $i) {
            if (!$this->secondLength[$i]) {
                continue;
            }
            for ($j = $this->length; $j < $this->firstLength; $j++) {
                if ($this->secondFlags[$j]) {
                    $this->length = $j + 1;
                    break;
                }
            }
            if ($one[$i] !== $two[$i]) {
                $this->transpositions++;
            }
        }
        $this->transpositions /= 2;
    }

    /**
     * @param string $one
     * @param string $two
     * @return float
     */
    private function calculateJaroDistance(string $one, string $two): float
    {
        $jaroDistance =
            (((float)$this->matching / $this->firstLength) +
                ((float)$this->matching / $this->secondLength) +
                ((float)($this->matching - $this->transpositions) / $this->matching)) / 3.0;

        $length = 0;
        $min = min(min($this->firstLength, $this->secondLength), 4);
        foreach (range(0, $min - 1) as $i) {
            if ($one[$i] === $two[$i]) {
                $length++;
            }
        }

        $jaroDistance += ($length * static::SCALING_FACTOR * (1 - $jaroDistance));

        return (float)$jaroDistance;
    }
}
