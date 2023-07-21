<?php

declare(strict_types=1);

namespace Tests\App\Service;

use App\Model\Number;
use App\Service\SubtractionCalculator;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

final class SubtractionCalculatorTest extends TestCase
{
    private SubtractionCalculator $subtractionCalculator;

    public function setUp(): void
    {
        $this->subtractionCalculator = new SubtractionCalculator();
    }

    public static function provideCalculatorValues(): \Generator
    {
        yield [10, 10, 0];
        yield [0, 1, -1];
        yield [-4, -7, 3];
        yield [-2.5, -7.5, 5];
    }

    #[DataProvider('provideCalculatorValues')]
    public function testCalculatesPackGroup(float $actualResult1, float $actualResult2, float $expectedResult): void
    {
        $number1 = new Number($actualResult1);
        $number2 = new Number($actualResult2);
        $result = $this->subtractionCalculator->calculate($number1, $number2);
        self::assertSame($expectedResult, $result);
    }
}