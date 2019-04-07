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
     * @dataProvider examples
     * @param string $one
     * @param string $two
     * @param float $expected
     */
    public function it_returns_the_calculated_similarity(string $one, string $two, float $expected)
    {
        $cosineDistance = new CosineDistance;

        $result = $cosineDistance->calculate($one, $two);
        $this->assertEquals($expected, $result);
    }

    public function examples()
    {
        return [
            ['', '', 0],
            ['Victory Bible Baptist Church', 'Baptist Victory Bible Church', 1],
            ['Woodforest Financial Group Incorporated', 'Woodforest Financial Group Inc', 0.75],
        ];
    }
}