<?php

namespace Nsbx\AdventOfCode;

require 'vendor/autoload.php';

$inputContent = file_get_contents(__DIR__ . '/input.txt');

$inputArray = explode("\r\n", $inputContent);
$inputArray = array_values(array_filter($inputArray)); // remove empty line

const BAG_CONTENTS = [
    'red'   => 12,
    'green' => 13,
    'blue'  => 14,
];

$gamePossibleIds = [];

foreach ($inputArray as $index => $gameString) {
    $gameArray = explode(': ', $gameString);
    $gameId    = (int) str_replace('Game ', '', $gameArray[0]);
    $gameSets  = explode('; ', $gameArray[1]);

    $gameResults = [];

    foreach ($gameSets as $set) {
        $setArray = explode(', ', $set);

        $setResult = [];
        foreach ($setArray as $item) {
            $setIsPossible = true;

            $itemArray = explode(' ', $item);
            $cubeValue = (int) $itemArray[0];
            $cubeColor = $itemArray[1];

            if ($cubeValue > BAG_CONTENTS[$cubeColor]) {
                $setIsPossible = false;
            }

            $setResult[] = $setIsPossible;
        }

        $gameResults[] = (bool) array_product($setResult);
    }

    if ((bool) array_product($gameResults)) {
        $gamePossibleIds[] = $gameId;
    }

}

dump(array_sum($gamePossibleIds));
