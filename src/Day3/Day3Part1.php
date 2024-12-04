<?php
declare(strict_types=1);

namespace FrankVerhoeven\AoC2024\Day3;

use FrankVerhoeven\AoC2024\PuzzleSolver;

final readonly class Day3Part1 implements PuzzleSolver
{
    /** @var list<string> */
    private array $input;

    public static function fromStringInput(string $input): PuzzleSolver
    {
        $solver = new self();
        $solver->input = \explode(\PHP_EOL, $input);

        return $solver;
    }

    public function solve(): string
    {
        $result = 0;

        foreach ($this->input as $line) {
            \preg_match_all('/mul\((\d+),(\d+)\)/', $line, $matches);

            foreach ($matches[1] as $key => $match) {
                $result += $match * $matches[2][$key];
            }
        }

        return (string) $result;
    }
}
