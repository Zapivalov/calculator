<?php

declare(strict_types=1);

namespace Tests\App\Model;

use App\Model\Number;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;
use Webmozart\Assert\InvalidArgumentException;

final class NumberTest extends TestCase
{
    #[DataProvider('provideValues')]
    public function testCreatesNumber(string $value): void
    {
        $this->expectNotToPerformAssertions();
        Number::createFromString($value);
    }

    #[DataProvider('provideInvalidValues')]
    public function testCannotCreateWeightWithLetters(string $value):void
    {
        $this->expectException(InvalidArgumentException::class);
        Number::createFromString($value);
    }

    public static function provideValues(): \Generator
    {
        yield ['10'];
        yield ['4.5'];
        yield ['7,8'];
    }

    public static function provideInvalidValues(): \Generator
    {
        yield ['333ff'];
        yield ['fg,'];
        yield ['4345fg.'];
    }
}
