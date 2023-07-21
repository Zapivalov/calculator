<?php

declare(strict_types=1);

namespace Tests\App\Service;

use App\Model\Number;
use App\Service\AdditionCalculator;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

final class AdditionCalculatorTest extends TestCase
{
    private AdditionCalculator $additionCalculator;

    public function setUp(): void
    {
        $this->additionCalculator = new AdditionCalculator();
    }

    public static function provideCalculatorValues(): \Generator
    {
        yield [10, 10, 20];
        yield [0, 1, 1];
        yield [-4, -7, -11];
        yield [-2.5, -7.5, -10];
    }

    #[DataProvider('provideCalculatorValues')]
    public function testCalculatesPackGroup(float $actualResult1, float $actualResult2, float $expectedResult): void
    {
        $number1 = new Number($actualResult1);
        $number2 = new Number($actualResult2);
        $result = $this->additionCalculator->calculate($number1, $number2);
        self::assertSame($expectedResult, $result);
    }
}