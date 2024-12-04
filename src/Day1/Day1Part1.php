#!/usr/bin/env php
<?php
declare(strict_types=1);

namespace FrankVerhoeven\AoC2024\Day1;

use FrankVerhoeven\AoC2024\PuzzleSolver;

final readonly class Day1Part1 implements PuzzleSolver
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

        \sort($left);
        \sort($right);

        $distance = 0;

        foreach ($left as $key => $position) {
            $distance += \abs($position - $right[$key]);
        }

        return (string) $distance;
    }
}
