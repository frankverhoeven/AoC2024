<?php
declare(strict_types=1);

namespace FrankVerhoeven\Aoc2024\Day4;

use FrankVerhoeven\Aoc2024\CodeCracker;

final readonly class Day4Part2 implements CodeCracker
{
    /** @var list<string> */
    private array $input;

    private int $rowCount;
    private int $columnCount;

    public static function fromStringInput(string $input): CodeCracker
    {
        $codeCracker = new self();
        $codeCracker->input = \explode(\PHP_EOL, $input);
        $codeCracker->rowCount = \count($codeCracker->input);
        $codeCracker->columnCount = \strlen($codeCracker->input[0]);

        return $codeCracker;
    }

    public function crackTheCode(): string
    {
        $count = 0;

        foreach ($this->input as $row => $line) {
            foreach (\str_split($line) as $column => $letter) {
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
        if ($column + 2 >= $this->columnCount || $row + 2 >= $this->rowCount) {
            return false;
        }

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
        if ($column + 2 >= $this->columnCount || $row + 2 >= $this->rowCount) {
            return false;
        }

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
