<?php declare(strict_types=1);

namespace Olevv\SimilarityStrings\Algorithm;

use PHPUnit\Framework\TestCase;

/**
 * Class ThreeSets
 * @package Olevv\SimilarityStrings\Algorithm
 */
final class ThreeSetsTest extends TestCase
{
    /**
     * @test
     */
    public function it_returns_the_calculated_similarity()
    {
        $strOne = 'I love you';
        $strTwo = 'Also i love you';

        $threeSets = new ThreeSets;

        $result = $threeSets->calculate($strOne, $strTwo);
        $this->assertEquals(77.78, $result);
    }
}