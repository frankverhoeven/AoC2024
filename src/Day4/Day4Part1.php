<?php
declare(strict_types=1);

namespace FrankVerhoeven\AoC2024\Day4;

use FrankVerhoeven\AoC2024\PuzzleSolver;

final readonly class Day4Part1 implements PuzzleSolver
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
            foreach (\str_split($line) as $column => $letter) {
                if ('X' !== $letter) {
                    continue;
                }

                $count += (int) $this->findRight($row, $column)
                    + (int) $this->findLeft($row, $column)
                    + (int) $this->findUp($row, $column)
                    + (int) $this->findDown($row, $column)
                    + (int) $this->findRightUp($row, $column)
                    + (int) $this->findRightDown($row, $column)
                    + (int) $this->findLeftUp($row, $column)
                    + (int) $this->findLeftDown($row, $column);
            }
        }

        return (string) $count;
    }

    private function findRight(int $row, int $column): bool
    {
        if ($column + 3 >= $this->columnCount) {
            return false;
        }

        return 0 === \substr_compare($this->input[$row], 'XMAS', $column, 4);
    }

    private function findLeft(int $row, int $column): bool
    {
        if ($column - 3 < 0) {
            return false;
        }

        return 0 === \substr_compare($this->input[$row], 'SAMX', $column - 3, 4);
    }

    private function findUp(int $row, int $column): bool
    {
        if ($row - 3 < 0) {
            return false;
        }

        return 'X' === $this->input[$row][$column]
            && 'M' === $this->input[$row - 1][$column]
            && 'A' === $this->input[$row - 2][$column]
            && 'S' === $this->input[$row - 3][$column];
    }

    private function findDown(int $row, int $column): bool
    {
        if ($row + 3 >= $this->rowCount) {
            return false;
        }

        return 'X' === $this->input[$row][$column]
            && 'M' === $this->input[$row + 1][$column]
            && 'A' === $this->input[$row + 2][$column]
            && 'S' === $this->input[$row + 3][$column];
    }

    private function findRightDown(int $row, int $column): bool
    {
        if ($column + 3 >= $this->columnCount || $row + 3 >= $this->rowCount) {
            return false;
        }

        return 'X' === $this->input[$row][$column]
            && 'M' === $this->input[$row + 1][$column + 1]
            && 'A' === $this->input[$row + 2][$column + 2]
            && 'S' === $this->input[$row + 3][$column + 3];
    }

    private function findRightUp(int $row, int $column): bool
    {
        if ($column + 3 >= $this->columnCount || $row - 3 < 0) {
            return false;
        }

        return 'X' === $this->input[$row][$column]
            && 'M' === $this->input[$row - 1][$column + 1]
            && 'A' === $this->input[$row - 2][$column + 2]
            && 'S' === $this->input[$row - 3][$column + 3];
    }

    private function findLeftDown(int $row, int $column): bool
    {
        if ($column - 3 < 0 || $row + 3 >= $this->rowCount) {
            return false;
        }

        return 'X' === $this->input[$row][$column]
            && 'M' === $this->input[$row + 1][$column - 1]
            && 'A' === $this->input[$row + 2][$column - 2]
            && 'S' === $this->input[$row + 3][$column - 3];
    }

    private function findLeftUp(int $row, int $column): bool
    {
        if ($column - 3 < 0 || $row - 3 < 0) {
            return false;
        }

        return 'X' === $this->input[$row][$column]
            && 'M' === $this->input[$row - 1][$column - 1]
            && 'A' === $this->input[$row - 2][$column - 2]
            && 'S' === $this->input[$row - 3][$column - 3];
    }
}
