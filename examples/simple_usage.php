<?php declare(strict_types=1);

use Olevv\SimilarityStrings\Algorithm\CosineDistance;

require_once __DIR__ . '/../vendor/autoload.php';

$one = 'Woodforest Financial Group Incorporated';
$two = 'Woodforest Financial Group Inc';

$cosineDistance = new CosineDistance;

$similarity = $cosineDistance->calculate($one, $two);
echo 'Cosine distance: ' . $similarity * 100 . '%';