<?php declare(strict_types=1);

use Olevv\SimilarityStrings\Algorithm\CosineDistance;

require_once __DIR__ . '/../vendor/autoload.php';

$one = 'I love you';
$two = 'Also i love you';

$cosineDistance = new CosineDistance;

$similarity = $cosineDistance->calculate($one, $two);
echo 'Cosine distance: ' . $similarity . '%';