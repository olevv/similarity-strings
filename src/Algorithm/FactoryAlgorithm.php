<?php declare(strict_types=1);

namespace Olevv\SimilarityStrings\Algorithm;

use Olevv\SimilarityStrings\Exceptions\InvalidArgumentException;

/**
 * Class FactoryAlgorithm
 * @package Olevv\SimilarityStrings\Algorithm
 */
final class FactoryAlgorithm implements FactoryAlgorithmInterface
{
    public const ALL = 'all';
    public const LEVENSHTEIN = 'levenshtein';
    public const COSINE_DISTANCE = 'cosine_distance';
    public const THREE_SETS = 'three_sets';
    public const JACCARD = 'jaccard';
    public const SIMILAR_TEXT = 'similar_text';

    /**
     * @param string $preset
     * @return CompositeAlgorithmInterface
     * @throws InvalidArgumentException
     */
    public function build(string $preset): CompositeAlgorithmInterface
    {
        if (empty($preset)) {
            throw new InvalidArgumentException('No such algorithm preset');
        }

        $composite = new CompositeAlgorithm();

        switch ($preset) {
            case static::ALL:
                $composite->addAlgorithm(new Jaccard());
                $composite->addAlgorithm(new SimilarText());
                $composite->addAlgorithm(new Levenstein());
                $composite->addAlgorithm(new CosineDistance());
                $composite->addAlgorithm(new ThreeSets());

                return $composite;
                break;
            case static::COSINE_DISTANCE:
                $composite->addAlgorithm(new CosineDistance());

                return $composite;
                break;
            case static::LEVENSHTEIN:
                $composite->addAlgorithm(new Levenstein());

                return $composite;
                break;
            case static::THREE_SETS:
                $composite->addAlgorithm(new ThreeSets());

                return $composite;
                break;
            case static::SIMILAR_TEXT:
                $composite->addAlgorithm(new SimilarText());

                return $composite;
                break;
            default:
                throw new InvalidArgumentException('No such algorithm preset');
        }
    }
}
