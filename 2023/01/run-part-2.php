<?php

namespace Nsbx\AdventOfCode;

require 'vendor/autoload.php';

const NUMBER_TO_WORDS = [
    1 => 'one',
    2 => 'two',
    3 => 'three',
    4 => 'four',
    5 => 'five',
    6 => 'six',
    7 => 'seven',
    8 => 'eight',
    9 => 'nine',
];

$inputContent = file_get_contents(__DIR__ . '/input.txt');

$inputArray = explode("\r", $inputContent);

$calibrationValues = [];

foreach ($inputArray as $item) {
    preg_match_all("/(?=(\d|one|two|three|four|five|six|seven|eight|nine))/", $item, $matches);
    $matches = $matches[1];

    $first = current($matches);
    end($matches);
    $last = current($matches);

    $wordsToNumber = array_flip(NUMBER_TO_WORDS);

    if (array_key_exists($first, $wordsToNumber)) {
        $first = $wordsToNumber[$first];
    }

    if (array_key_exists($last, $wordsToNumber)) {
        $last = $wordsToNumber[$last];
    }

    $calibrationValue = $first . $last;

    if ($calibrationValue === '') {
        continue;
    }

    $calibrationValues[] = $calibrationValue;
}

dump(array_sum($calibrationValues));
