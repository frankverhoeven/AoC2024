<?php
declare(strict_types=1);

namespace FrankVerhoeven\AoC2024\Day4;

use FrankVerhoeven\AoC2024\PuzzleSolver;

final readonly class Day4Part2 implements PuzzleSolver
{
    /** @var list<string> */
    private array $input;

    private int $rowCount;
    private int $columnCount;

    public static function fromStringInput(string $input): PuzzleSolver
    {
        $solver = new self();
        $solver->input = \explode(\PHP_EOL, $input);
        $solver->rowCount = \count($solver->input);
        $solver->columnCount = \strlen($solver->input[0]);

        return $solver;
    }

    public function solve(): string
    {
        $count = 0;

        foreach ($this->input as $row => $line) {
            if ($row + 2 >= $this->rowCount) {
                break;
            }

            foreach (\str_split($line) as $column => $letter) {
                if ($column + 2 >= $this->columnCount) {
                    break;
                }

                if ('S' !== $letter && 'M' !== $letter) {
                    continue;
                }

                if ($this->findDownRight($row, $column) && $this->findDownLeft($row, $column)) {
                    $count++;
                }
            }
        }

        return (string) $count;
    }

    private function findDownRight(int $row, int $column): bool
    {
        return (
            'M' === $this->input[$row][$column]
            && 'A' === $this->input[$row + 1][$column + 1]
            && 'S' === $this->input[$row + 2][$column + 2]
        ) || (
            'S' === $this->input[$row][$column]
            && 'A' === $this->input[$row + 1][$column + 1]
            && 'M' === $this->input[$row + 2][$column + 2]
        );
    }

    private function findDownLeft(int $row, int $column): bool
    {
        return (
            'M' === $this->input[$row][$column + 2]
            && 'A' === $this->input[$row + 1][$column + 1]
            && 'S' === $this->input[$row + 2][$column]
        ) || (
            'S' === $this->input[$row][$column + 2]
            && 'A' === $this->input[$row + 1][$column + 1]
            && 'M' === $this->input[$row + 2][$column]
        );
    }
}
