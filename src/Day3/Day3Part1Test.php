<?php
declare(strict_types=1);

namespace FrankVerhoeven\Aoc2024\Day3;

use PHPUnit\Framework\TestCase;

final class Day3Part1Test extends TestCase
{
    public function testExampleCase(): void
    {
        $codeCracker = Day3Part1::fromStringInput('xmul(2,4)%&mul[3,7]!@^do_not_mul(5,5)+mul(32,64]then(mul(11,8)mul(8,5))');

        self::assertSame('161', $codeCracker->crackTheCode());
    }
}
