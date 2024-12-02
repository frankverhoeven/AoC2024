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

    if (isReportSafe($levels)) {
        ++$safeCount;

        continue;
    }

    foreach ($levels as $key => $level) {
        $levelsWithOneRemoved = $levels;

        unset($levelsWithOneRemoved[$key]);
        $levelsWithOneRemoved = array_values($levelsWithOneRemoved);

        if (isReportSafe($levelsWithOneRemoved)) {
            ++$safeCount;
            break;
        }
    }
}

fclose($filePointer);

function isReportSafe(array $levels): bool
{
    $direction = null; // true = increasing, false = decreasing
    $levelCount = count($levels);

    foreach ($levels as $key => $level) {
        if ($key === $levelCount - 1) {
            return true;
        }

        if ($direction === true && $level <= $levels[$key + 1]) {
            return false;
        }

        if ($direction === false && $level >= $levels[$key + 1]) {
            return false;
        }

        if ($direction === null) {
            $direction = $level > $levels[$key + 1];
        }

        $diff = abs($level - $levels[$key + 1]);

        if ($diff < 1 || $diff > 3) {
            return false;
        }
    }

    return false;
}

echo 'Safe: ' . $safeCount . PHP_EOL;
