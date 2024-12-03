#!/usr/bin/env php
<?php
declare(strict_types=1);

namespace FrankVerhoeven\Aoc2024\Day1;

use FrankVerhoeven\Aoc2024\CodeCracker;

final readonly class Day1Part2 implements CodeCracker
{
    /** @var list<string> */
    private array $input;

    public static function fromStringInput(string $input): self
    {
        $codeCracker = new self();
        $codeCracker->input = \explode(\PHP_EOL, $input);

        return $codeCracker;
    }

    public function crackTheCode(): string
    {
        $left = $right = [];

        foreach ($this->input as $line) {
            [$leftPosition, $rightPosition] = \explode('   ', $line);

            $left[] = (int) $leftPosition;
            $right[] = (int) $rightPosition;
        }

        $rightCount = \array_count_values($right);

        $similarity = 0;

        foreach ($left as $position) {
            $similarity += ($rightCount[$position] ?? 0) * $position;
        }

        return (string) $similarity;
    }
}
