<?php
declare(strict_types=1);

namespace FrankVerhoeven\AoC2024\Day6;

use FrankVerhoeven\AoC2024\PuzzleSolver;

final class Day6Part2 implements PuzzleSolver
{
    /** @var list<list<string>> */
    private array $map;
    private readonly int $maxX;
    private readonly int $maxY;

    /** @var array{int, int} */
    private array $startPosition;
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
                    $solver->startPosition = [$x, $y];
                    break 2;
                }
            }
        }

        $solver->maxX = \count($solver->map[0]);
        $solver->maxY = \count($solver->map);

        return $solver;
    }

    public function solve(): string
    {
        $obstacleCount = 0;

        // Very inefficient brute-force approach
        for ($y = 0; $y < $this->maxY; $y++) {
            // Sure could use some multi-threading here
            for ($x = 0; $x < $this->maxX; $x++) {
                // Perhaps we should look into the actual math...
                if ('#' === $this->map[$y][$x] || '^' === $this->map[$y][$x]) {
                    continue;
                }

                $this->map[$y][$x] = '#';

                if ($this->containsLoop($this->map, $this->startPosition)) {
                    $obstacleCount++;
                }

                $this->map[$y][$x] = '.';
            }
        }

        // Slow but steady won the race =)

        return (string) $obstacleCount;
    }

    /**
     * @param list<list<string>> $map
     * @param array{int, int}    $position
     */
    private function containsLoop(array $map, array $position): bool
    {
        $this->direction = [0, -1];
        $previousTurns = [];
        $newPosition = [$position[0] + $this->direction[0], $position[1] + $this->direction[1]];

        while (
            $newPosition[0] >= 0
            && $newPosition[0] < $this->maxX
            && $newPosition[1] >= 0
            && $newPosition[1] < $this->maxY
        ) {
            if ('#' === $map[$newPosition[1]][$newPosition[0]]) {
                $sameTurns = \array_filter(
                    $previousTurns,
                    static fn (array $turn): bool => $turn === $position,
                );

                if (\count($sameTurns) > 1) { // We took the same turn twice -> loop
                    return true;
                }

                $previousTurns[] = $position;

                $this->changeDirection();
            } else {
                $position = $newPosition;
            }

            $newPosition = [$position[0] + $this->direction[0], $position[1] + $this->direction[1]];
        }

        return false;
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
