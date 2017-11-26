<?php declare(strict_types=1);

use Olevv\SimilarityStrings\Algorithm\CosineDistance;

require_once __DIR__ . '/../vendor/autoload.php';

$strOne = 'I love you';
$strTwo = 'Also i love you';

$cosineDistance = new CosineDistance;

$similarity = $cosineDistance->calculate($strOne, $strTwo);
echo 'Cosine distance: ' . $similarity . '%';