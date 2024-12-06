<?php
declare(strict_types=1);

namespace FrankVerhoeven\AoC2024\Day6;

use FrankVerhoeven\AoC2024\PuzzleSolver;

final class Day6Part1 implements PuzzleSolver
{
    /** @var list<list<string>> */
    private readonly array $map;
    private readonly int $maxX;
    private readonly int $maxY;

    /** @var array{int, int} */
    private array $position;
    /** @var array{int, int} */
    private array $direction;

    public static function fromStringInput(string $input): PuzzleSolver
    {
        $solver = new self();
        $solver->map = \array_map(
            static fn (string $line): array => \str_split($line),
            \explode(\PHP_EOL, $input),
        );

        foreach ($solver->map as $y => $line) {
            foreach ($line as $x => $char) {
                if ('^' === $char) {
                    $solver->position = [$x, $y];
                    break 2;
                }
            }
        }

        $solver->direction = [0, -1];

        $solver->maxX = \count($solver->map[0]);
        $solver->maxY = \count($solver->map);

        return $solver;
    }

    public function solve(): string
    {
        $visitedPositions = [$this->position];

        $newPosition = [$this->position[0] + $this->direction[0], $this->position[1] + $this->direction[1]];

        while (
            $newPosition[0] >= 0
            && $newPosition[0] < $this->maxX
            && $newPosition[1] >= 0
            && $newPosition[1] < $this->maxY
        ) {
            if ('#' === $this->map[$newPosition[1]][$newPosition[0]]) {
                $this->changeDirection();
            } else {
                $this->position = $newPosition;

                if (!\in_array($this->position, $visitedPositions)) {
                    $visitedPositions[] = $this->position;
                }
            }

            $newPosition = [$this->position[0] + $this->direction[0], $this->position[1] + $this->direction[1]];
        }

        return (string) \count($visitedPositions);
    }

    private function changeDirection(): void
    {
        $this->direction = match ($this->direction) {
            [0, -1] => [1, 0],  // Up to right
            [1, 0]  => [0, 1],  // Right to down
            [0, 1]  => [-1, 0], // Down to left
            [-1, 0] => [0, -1], // Left to up
        };
    }
}
