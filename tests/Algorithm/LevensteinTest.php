<?php declare(strict_types=1);

namespace Olevv\SimilarityStrings\Algorithm;

use PHPUnit\Framework\TestCase;

/**
 * Class Levenstein
 * @package Olevv\SimilarityStrings\Algorithm
 */
final class LevensteinTest extends TestCase
{
    /**
     * @test
     */
    public function it_returns_the_calculated_similarity() :void
    {
        $strOne = 'I love you';
        $strTwo = 'Also i love you';

        $levenstein = new Levenstein;

        $result = $levenstein->calculate($strOne, $strTwo);
        $this->assertEquals(60, $result);
    }
}