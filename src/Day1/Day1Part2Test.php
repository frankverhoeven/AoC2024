<?php
declare(strict_types=1);

namespace FrankVerhoeven\Aoc2024\Day1;

use PHPUnit\Framework\TestCase;

final class Day1Part2Test extends TestCase
{
    public function testExampleCase(): void
    {
        $codeCracker = Day1Part2::fromStringInput(<<<'INPUT'
3   4
4   3
2   5
1   3
3   9
3   3
INPUT);

        self::assertSame('31', $codeCracker->crackTheCode());
    }
}
