<?php
declare(strict_types=1);

namespace FrankVerhoeven\AoC2024\Day6;

use PHPUnit\Framework\TestCase;

final class Day6Part1Test extends TestCase
{
    public function testExampleCase(): void
    {
        $solver = Day6Part1::fromStringInput(<<<'INPUT'
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

        self::assertSame('41', $solver->solve());
    }
}
