<?php declare(strict_types=1);

namespace Olevv\SimilarityStrings\Sanitizer;

use Olevv\SimilarityStrings\Exceptions\InvalidArgumentException;

/**
 * Class Sanitizer
 * @package Olevv\SimilarityStrings\Sanitizer
 */
final class Sanitizer implements SanitizerInterface
{
    /**
     * @param string $str
     * @return string
     * @throws InvalidArgumentException
     */
    public function sanitize(string $str): string
    {
        if (empty($str)) {
            throw new InvalidArgumentException('String can\'t be empty');
        }

        $str = mb_strtolower($str);

        $str = filter_var($str, FILTER_SANITIZE_STRING);

        return preg_replace('/[^A-Za-z\d]/', ' ', $str);
    }
}
