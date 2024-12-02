#!/usr/bin/env php
<?php
declare(strict_types=1);

$filePointer = fopen(__DIR__ . '/input.txt', 'rb');

$left = $right = [];

while ($line = fgets($filePointer)) {
    [$leftPosition, $rightPosition] = explode('   ', $line);

    $left[] = (int) $leftPosition;
    $right[] = (int) $rightPosition;
}

fclose($filePointer);

sort($left);
sort($right);

$distance = 0;

foreach ($left as $key => $position) {
    $distance += abs($position - $right[$key]);
}

echo 'Distance: ' . $distance . PHP_EOL;
