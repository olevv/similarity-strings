<?php declare(strict_types=1);

namespace unit\Algorithm;

use Framework\TestCase;
use Olevv\SimilarityStrings\Algorithm\CosineDistance;

final class CosineDistanceTest extends TestCase
{
    public function it_returns_the_calculated_similarity() :void
    {
        $strOne = 'I love you';
        $strTwo = 'Also i love you';

        $cosineDistance = new CosineDistance;

        $result = $cosineDistance->calculate($strOne, $strTwo);
        $this->assertEquals(57.74, $result);
    }
}