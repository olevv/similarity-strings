# Similarity Strings
Library to compare strings similarity written in PHP

### Setup

Should be installed php 7

Then install similarity-strings library itself:
```bash
composer require olevv/similarity-strings
```

### Usage

```php
<?php declare(strict_types = 1);

use Datanyze\Reporter\Algorithm\FactoryAlgorithm;
use Datanyze\Reporter\Exceptions\InvalidArgumentException;
use Datanyze\Reporter\Sanitizer\SanitizerStrings;

require_once __DIR__ . '/vendor/autoload.php';

$strOne = "Hi, I live in the country Russia, city Saint Petersburg";
$strTwo = "Hi, I'm from Saint-Petersburg, live in Russia";

try{
  $sanitizer = new SanitizerStrings();
  $strOne = $sanitizer->sanitize($strOne);
  $strTwo = $sanitizer->sanitize($strTwo);

  $similarity = (new FactoryAlgorithm())->build(FactoryAlgorithm::ALL);

  foreach ($similarity->calculate($strOne, $strTwo) as $name => $value){
      echo name . ": " . $value . "%" . "\n";
  }
}catch(InvalidArgumentException $e){
  echo $e->getMessage();
}
