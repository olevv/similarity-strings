<?php declare(strict_types=1);

use Olevv\SimilarityStrings\Algorithm\JaroWinkler;
use Olevv\SimilarityStrings\Algorithm\ThreeSets;

require_once __DIR__ . '/../vendor/autoload.php';

$one = 'Woodforest Financial Group Incorporated';
$two = 'Woodforest Financial Group Inc';

$threeSets = new ThreeSets;
$jaroWinkler = new JaroWinkler;

$similarity = $threeSets->calculate($one, $two);
echo 'Three sets distance: ' . $similarity . "\n";
$similarity = $jaroWinkler->calculate($one, $two);
echo 'Jaro winkler distance: ' . $similarity;