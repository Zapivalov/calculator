<?php

declare(strict_types=1);

namespace App\Model;

use Webmozart\Assert\Assert;

final class Number
{
    public static function createFromString(string $value): self
    {
        $number = str_replace(',', '.', $value);
        Assert::numeric($number, 'Должны быть только цифры');

        return new self((float) $number);
    }

    public function __construct(
        public readonly float $value,
    ) {
    }

    public function isZero(): bool
    {
        return $this->value === 0.0;
    }
}