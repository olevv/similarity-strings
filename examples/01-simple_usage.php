<?php declare(strict_types=1);

use Olevv\SimilarityStrings\Algorithm\CosineDistance;

require_once __DIR__ . '/../vendor/autoload.php';

$strOne = "Hi, I live in the country Russia, city Saint Petersburg";
$strTwo = "Hi, I'm from Saint-Petersburg, live in Russia";

$levenstein = new CosineDistance;

$similarity = $levenstein->calculate($strOne, $strTwo);
echo "Cosine Distance: " . $similarity . "%" . "\n";