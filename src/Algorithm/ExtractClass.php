<?php declare(strict_types=1);

namespace Olevv\SimilarityStrings\Algorithm;

/**
 * Class ExtractClass
 * @package Olevv\SimilarityStrings\Algorithm
 */
abstract class ExtractClass
{
    /**
     * @param string $className
     * @return string
     */
    protected function getAlgorithmName(string $className): string
    {
        $className = join('', array_slice(explode('\\', $className), -1));

        preg_match_all('/[A-Z][^A-Z]*?/Usu', $className, $matches);

        return implode(' ', $matches[0]);
    }
}
