#!/usr/bin/env php
<?php
declare(strict_types=1);

$safeCount = 0;
$filePointer = fopen(__DIR__ . '/input.txt', 'rb');

while ($line = fgets($filePointer)) {
    $levels = array_map(
        'intval',
        explode(' ', $line),
    );

    $direction = null; // true = increasing, false = decreasing
    $levelCount = count($levels);

    foreach ($levels as $key => $level) {
        if ($key === $levelCount - 1) {
            ++$safeCount;

            break;
        }

        if ($direction === true && $level <= $levels[$key + 1]) {
            break;
        }

        if ($direction === false && $level >= $levels[$key + 1]) {
            break;
        }

        if ($direction === null) {
            $direction = $level > $levels[$key + 1];
        }

        $diff = abs($level - $levels[$key + 1]);

        if ($diff < 1 || $diff > 3) {
            break;
        }
    }
}

fclose($filePointer);

echo 'Safe: ' . $safeCount . PHP_EOL;
