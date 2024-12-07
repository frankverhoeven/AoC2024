<?php
declare(strict_types=1);

namespace FrankVerhoeven\AoC2024\Day7;

use FrankVerhoeven\AoC2024\Day7\Day7Part1;
use PHPUnit\Framework\TestCase;

final class Day7Part2Test extends TestCase
{
    public function testExampleCase(): void
    {
        $solver = Day7Part2::fromStringInput(<<<'INPUT'
190: 10 19
3267: 81 40 27
83: 17 5
156: 15 6
7290: 6 8 6 15
161011: 16 10 13
192: 17 8 14
21037: 9 7 18 13
292: 11 6 16 20
INPUT);

        self::assertSame('11387', $solver->solve());
    }
}
