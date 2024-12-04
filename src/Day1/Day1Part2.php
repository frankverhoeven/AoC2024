#!/usr/bin/env php
<?php
declare(strict_types=1);

namespace FrankVerhoeven\AoC2024\Day1;

use FrankVerhoeven\AoC2024\PuzzleSolver;

final readonly class Day1Part2 implements PuzzleSolver
{
    /** @var list<string> */
    private array $input;

    public static function fromStringInput(string $input): self
    {
        $solver = new self();
        $solver->input = \explode(\PHP_EOL, $input);

        return $solver;
    }

    public function solve(): string
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
