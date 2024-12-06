<?php
declare(strict_types=1);

namespace FrankVerhoeven\AoC2024\Day5;

use FrankVerhoeven\AoC2024\PuzzleSolver;

final readonly class Day5Part1 implements PuzzleSolver
{
    /** @var list<array{string, string}> */
    private array $rules;
    /** @var list<list<string>> */
    private array $pages;

    public static function fromStringInput(string $input): PuzzleSolver
    {
        [$rules, $pages] = \explode(\PHP_EOL . \PHP_EOL, $input);

        $solver = new self();
        $solver->rules = \array_map(
            static fn (string $rule): array => \explode('|', $rule),
            \explode(\PHP_EOL, $rules),
        );
        $solver->pages = \array_map(
            static fn (string $page): array => \explode(',', $page),
            \explode(\PHP_EOL, $pages),
        );

        return $solver;
    }

    public function solve(): string
    {
        $result = 0;

        foreach ($this->pages as $page) {
            if (!$this->isPageValid($page)) {
                continue;
            }

            $result += (int) $page[(\ceil(\count($page) / 2)) - 1];
        }

        return (string) $result;
    }

    /** @param list<string> $page */
    private function isPageValid(array $page): bool
    {
        foreach ($this->rules as [$first, $last]) {
            if (!\in_array($first, $page) || !\in_array($last, $page)) {
                continue;
            }

            if (\array_search($first, $page) > \array_search($last, $page)) {
                return false;
            }
        }

        return true;
    }
}
