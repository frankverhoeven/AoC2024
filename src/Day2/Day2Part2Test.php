<?php
declare(strict_types=1);

namespace FrankVerhoeven\AoC2024\Day2;

use PHPUnit\Framework\TestCase;

final class Day2Part2Test extends TestCase
{
    public function testExampleCase(): void
    {
        $solver = Day2Part2::fromStringInput(<<<'INPUT'
7 6 4 2 1
1 2 7 8 9
9 7 6 2 1
1 3 2 4 5
8 6 4 4 1
1 3 6 7 9
INPUT);

        self::assertSame('4', $solver->solve());
    }
}
