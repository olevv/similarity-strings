<?php declare(strict_types=1);

namespace Olevv\SimilarityStrings\Sanitizer;

/**
 * Interface SanitizerInterface
 * @package Olevv\SimilarityStrings\Sanitizer
 */
interface SanitizerInterface
{
    public function sanitize(string $str): string;
}
