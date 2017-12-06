<?php declare(strict_types=1);

namespace Olevv\SimilarityStrings\Algorithm;

use PHPUnit\Framework\TestCase;

/**
 * Class CosineDistanceTest
 * @package Olevv\SimilarityStrings\Algorithm
 */
final class CosineDistanceTest extends TestCase
{
    /**
     * @test
     */
    public function it_returns_the_calculated_similarity()
    {
        $strOne = 'I love you';
        $strTwo = 'Also i love you';

        $cosineDistance = new CosineDistance;

        $result = $cosineDistance->calculate($strOne, $strTwo);
        $this->assertEquals(57.74, $result);
    }
}