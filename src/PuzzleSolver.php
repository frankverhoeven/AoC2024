<?php
declare(strict_types=1);

namespace FrankVerhoeven\AoC2024;

interface PuzzleSolver
{
    public static function fromStringInput(string $input): self;

    public function solve(): string;
}
