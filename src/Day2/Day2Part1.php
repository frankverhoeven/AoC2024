#!/usr/bin/env php
<?php
declare(strict_types=1);

namespace FrankVerhoeven\Aoc2024\Day2;

use FrankVerhoeven\Aoc2024\CodeCracker;

final readonly class Day2Part1 implements CodeCracker
{
    /** @var list<string> */
    private array $input;

    public static function fromStringInput(string $input): self
    {
        $codeCracker = new self();
        $codeCracker->input = \explode(\PHP_EOL, $input);

        return $codeCracker;
    }

    public function crackTheCode(): string
    {
        $safeCount = 0;

        foreach ($this->input as $line) {
            $levels = \array_map(
                'intval',
                \explode(' ', $line),
            );

            $direction = null; // true = increasing, false = decreasing
            $levelCount = \count($levels);

            foreach ($levels as $key => $level) {
                if ($key === $levelCount - 1) {
                    ++$safeCount;

                    break;
                }

                if (true === $direction && $level <= $levels[$key + 1]) {
                    break;
                }

                if (false === $direction && $level >= $levels[$key + 1]) {
                    break;
                }

                if (null === $direction) {
                    $direction = $level > $levels[$key + 1];
                }

                $diff = \abs($level - $levels[$key + 1]);

                if ($diff < 1 || $diff > 3) {
                    break;
                }
            }
        }

        return (string) $safeCount;
    }
}
