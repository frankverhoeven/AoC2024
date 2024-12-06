<?php
declare(strict_types=1);

namespace FrankVerhoeven\AoC2024\Day6;

use PHPUnit\Framework\TestCase;

final class Day6Part2Test extends TestCase
{
    public function testExampleCase(): void
    {
        $solver = Day6Part2::fromStringInput(<<<'INPUT'
....#.....
.........#
..........
..#.......
.......#..
..........
.#..^.....
........#.
#.........
......#...
INPUT);

        self::assertSame('6', $solver->solve());
    }
}
