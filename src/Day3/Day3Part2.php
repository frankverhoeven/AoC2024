<?php
declare(strict_types=1);

namespace FrankVerhoeven\AoC2024\Day3;

use FrankVerhoeven\AoC2024\PuzzleSolver;

final readonly class Day3Part2 implements PuzzleSolver
{
    private string $input;

    public static function fromStringInput(string $input): PuzzleSolver
    {
        $solver = new self();
        $solver->input = \str_replace(\PHP_EOL, '', $input);

        return $solver;
    }

    public function solve(): string
    {
        $explodedDont = \explode('don\'t()', $this->input);
        $parsedLine = \array_shift($explodedDont);

        foreach ($explodedDont as $dont) {
            $explodedDo = \explode('do()', $dont, 2);

            if (2 === \count($explodedDo)) {
                $parsedLine .= $explodedDo[1];
            }
        }

        \preg_match_all('/mul\((\d+),(\d+)\)/', $parsedLine, $matches);

        $result = 0;
        foreach ($matches[1] as $key => $match) {
            $result += $match * $matches[2][$key];
        }

        return (string) $result;
    }
}
