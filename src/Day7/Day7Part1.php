<?php
declare(strict_types=1);

namespace FrankVerhoeven\AoC2024\Day7;

use FrankVerhoeven\AoC2024\PuzzleSolver;

final class Day7Part1 implements PuzzleSolver
{
    /** @var list<string> */
    private readonly array $input;
    private array $combinations = [];

    public static function fromStringInput(string $input): PuzzleSolver
    {
        $solver = new self();
        $solver->input = \explode(\PHP_EOL, $input);

        return $solver;
    }

    public function solve(): string
    {
        $valid = [];

        foreach ($this->input as $line) {
            [$testValue, $numbers] = \explode(': ', $line);
            $numbers = \array_map(\intval(...), \explode(' ', \trim($numbers)));

            foreach ($this->possibleCombinations(\count($numbers) - 1) as $combination) {
                $sum = $numbers[0];

                foreach ($combination as $key => $operator) {
                    if ('+' === $operator) {
                        $sum += $numbers[$key + 1];
                    } else {
                        $sum *= $numbers[$key + 1];
                    }
                }

                if ($sum === (int) $testValue) {
                    $valid[] = $testValue;
                    break;
                }
            }
        }

        return (string) \array_sum($valid);
    }

    private function possibleCombinations(int $length): array
    {
        if (!isset($this->combinations[$length])) {
            $combinations = [];
            $elements = ['+', '*'];

            for ($i = 0; $i < 2 ** $length; $i++) {
                for ($j = 0; $j < $length; $j++) {
                    $combinations[$i][] = $elements[($i >> $j) & 1];
                }
            }

            $this->combinations[$length] = $combinations;
        }

        return $this->combinations[$length];
    }
}
