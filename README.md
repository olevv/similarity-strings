# Similarity Strings
Library to compare strings similarity written in PHP

[![Build Status](https://travis-ci.org/olevv/similarity-strings.svg?branch=master)](https://travis-ci.org/olevv/similarity-strings)

### Setup

Should be installed php 7

Then install similarity-strings library itself:
```bash
composer require olevv/similarity-strings
```

### Usage

```php
<?php declare(strict_types=1);

use Olevv\SimilarityStrings\Algorithm\Levenstein;

require_once __DIR__ . '/vendor/autoload.php';

$strOne = 'Hi, I live in Saint Petersburg, Russia';
$strTwo = "Hi, I'm from Saint-Petersburg, live in Russia";

$levenstein = new Levenstein;

$similarity = $levenstein->calculate($strOne, $strTwo);
echo 'Levenstein: ' . $similarity . "\n";
