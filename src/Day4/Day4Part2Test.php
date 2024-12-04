<?php
declare(strict_types=1);

namespace FrankVerhoeven\AoC2024\Day4;

use PHPUnit\Framework\TestCase;

final class Day4Part2Test extends TestCase
{
    public function testExampleCase(): void
    {
        $solver = Day4Part2::fromStringInput(<<<'INPUT'
MMMSXXMASM
MSAMXMSMSA
AMXSXMAAMM
MSAMASMSMX
XMASAMXAMM
XXAMMXXAMA
SMSMSASXSS
SAXAMASAAA
MAMMMXMMMM
MXMXAXMASX
INPUT);

        self::assertSame('9', $solver->solve());
    }
}
