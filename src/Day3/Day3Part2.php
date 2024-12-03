<?php
declare(strict_types=1);

namespace FrankVerhoeven\Aoc2024\Day3;

use FrankVerhoeven\Aoc2024\CodeCracker;

final readonly class Day3Part2 implements CodeCracker
{
    private string $input;

    public static function fromStringInput(string $input): CodeCracker
    {
        $codeCracker = new self();
        $codeCracker->input = \str_replace(\PHP_EOL, '', $input);

        return $codeCracker;
    }

    public function crackTheCode(): string
    {
        $explodedDont = \explode('don\'t()', $this->input);
        $parsedLine = \array_shift($explodedDont);

        foreach ($explodedDont as $dont) {
            $explodedDo = \explode('do()', $dont, 2);

            if (2 === \count($explodedDo)) {
                $parsedLine .= $explodedDo[1];
            }
        }

        \preg_match_all('/mul\((\d+),(\d+)\)/', $parsedLine, $matches);

        $result = 0;
        foreach ($matches[1] as $key => $match) {
            $result += $match * $matches[2][$key];
        }

        return (string) $result;
    }
}
