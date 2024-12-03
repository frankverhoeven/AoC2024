<?php
declare(strict_types=1);

namespace FrankVerhoeven\Aoc2024;

interface CodeCracker
{
    public static function fromStringInput(string $input): self;

    public function crackTheCode(): string;
}
