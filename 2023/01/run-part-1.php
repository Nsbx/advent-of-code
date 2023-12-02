<?php

namespace Nsbx\AdventOfCode;

require 'vendor/autoload.php';

$inputContent = file_get_contents(__DIR__ . '/input.txt');

$inputArray = explode("\r", $inputContent);

$calibrationValues = [];

foreach ($inputArray as $item) {
    preg_match_all("/\d/", $item, $matches);
    $matches = current($matches);

    $first = current($matches);
    end($matches);
    $last = current($matches);

    $calibrationValue = $first . $last;

    if ($calibrationValue === '') {
        continue;
    }

    $calibrationValues[] = $calibrationValue;
}

dump(array_sum($calibrationValues));
