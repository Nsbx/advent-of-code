<?php

namespace Nsbx\AdventOfCode;

require 'vendor/autoload.php';

$inputContent = file_get_contents(__DIR__ . '/input.txt');

$inputArray = explode("\r\n", $inputContent);
$inputArray = array_values(array_filter($inputArray)); // remove empty line

$gameFewestCubes = [];

foreach ($inputArray as $index => $gameString) {
    $gameArray = explode(': ', $gameString);
    $gameId    = (int) str_replace('Game ', '', $gameArray[0]);
    $gameSets  = explode('; ', $gameArray[1]);

    $gameResults = [
        'red'   => 0,
        'green' => 0,
        'blue'  => 0,
    ];

    foreach ($gameSets as $set) {
        $setArray = explode(', ', $set);

        foreach ($setArray as $item) {
            $itemArray = explode(' ', $item);
            $cubeValue = (int) $itemArray[0];
            $cubeColor = $itemArray[1];

            if ($cubeValue > $gameResults[$cubeColor]) {
                $gameResults[$cubeColor] = $cubeValue;
            }
        }
    }

    $redFewest   = $gameResults['red'];
    $greenFewest = $gameResults['green'];
    $blueFewest  = $gameResults['blue'];

    if ($redFewest === 999) {
        $redFewest = 1;
    }

    if ($greenFewest === 999) {
        $greenFewest = 1;
    }

    if ($blueFewest === 999) {
        $blueFewest = 1;
    }

    $gameFewestCubes[] = $redFewest * $greenFewest * $blueFewest;
}

dump(array_sum($gameFewestCubes));
