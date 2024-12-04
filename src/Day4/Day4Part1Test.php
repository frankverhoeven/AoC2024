<?php
declare(strict_types=1);

namespace FrankVerhoeven\Aoc2024\Day4;

use PHPUnit\Framework\TestCase;

final class Day4Part1Test extends TestCase
{
    public function testExampleCase(): void
    {
        $codeCracker = Day4Part1::fromStringInput(<<<'INPUT'
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

        self::assertSame('18', $codeCracker->crackTheCode());
    }
}
