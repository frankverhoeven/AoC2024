<?php
declare(strict_types=1);

namespace FrankVerhoeven\Aoc2024\Day3;

use FrankVerhoeven\Aoc2024\CodeCracker;

final readonly class Day3Part1 implements CodeCracker
{
    /** @var list<string> */
    private array $input;

    public static function fromStringInput(string $input): CodeCracker
    {
        $codeCracker = new self();
        $codeCracker->input = \explode(\PHP_EOL, $input);

        return $codeCracker;
    }

    public function crackTheCode(): string
    {
        $result = 0;

        foreach ($this->input as $line) {
            \preg_match_all('/mul\((\d+),(\d+)\)/', $line, $matches);

            foreach ($matches[1] as $key => $match) {
                $result += $match * $matches[2][$key];
            }
        }

        return (string) $result;
    }
}
