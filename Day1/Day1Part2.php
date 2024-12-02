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

$left = array_unique($left);
$rightCount = array_count_values($right);

$similarity = 0;

foreach ($left as $position) {
    $similarity += ($rightCount[$position] ?? 0) * $position;
}

echo 'Similarity: ' . $similarity . PHP_EOL;
