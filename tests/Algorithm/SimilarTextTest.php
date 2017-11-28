<?php declare(strict_types=1);

namespace Olevv\SimilarityStrings\Algorithm;

use PHPUnit\Framework\TestCase;

/**
 * Class SimilarText
 * @package Olevv\SimilarityStrings\Algorithm
 */
final class SimilarTextTest extends TestCase
{
    /**
     * @test
     */
    public function it_returns_the_calculated_similarity() :void
    {
        $strOne = 'I love you';
        $strTwo = 'Also i love you';

        $similarText = new SimilarText;

        $result = $similarText->calculate($strOne, $strTwo);
        $this->assertEquals(72, $result);
    }
}