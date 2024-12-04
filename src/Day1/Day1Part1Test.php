<?php
declare(strict_types=1);

namespace FrankVerhoeven\AoC2024\Day1;

use PHPUnit\Framework\TestCase;

final class Day1Part1Test extends TestCase
{
    public function testExampleCase(): void
    {
        $solver = Day1Part1::fromStringInput(<<<'INPUT'
3   4
4   3
2   5
1   3
3   9
3   3
INPUT);

        self::assertSame('11', $solver->solve());
    }
}
