<?php
declare(strict_types=1);

namespace FrankVerhoeven\AoC2024\Day3;

use PHPUnit\Framework\TestCase;

final class Day3Part2Test extends TestCase
{
    public function testCase(): void
    {
        $solver = Day3Part2::fromStringInput('xmul(2,4)&mul[3,7]!^don\'t()_mul(5,5)+mul(32,64](mul(11,8)undo()?mul(8,5))');

        self::assertSame('48', $solver->solve());
    }
}
