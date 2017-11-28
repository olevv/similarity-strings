<?php declare(strict_types=1);

namespace Olevv\SimilarityStrings\Algorithm;

use PHPUnit\Framework\TestCase;

/**
 * Class JaccardTest
 * @package Olevv\SimilarityStrings\Algorithm
 */
final class JaccardTest extends TestCase
{
    /**
     * @test
     */
    public function it_returns_the_calculated_similarity() :void
    {
        $strOne = 'I love you';
        $strTwo = 'Also i love you';

        $jaccard = new Jaccard;

        $result = $jaccard->calculate($strOne, $strTwo);
        $this->assertEquals(28.57, $result);
    }
}