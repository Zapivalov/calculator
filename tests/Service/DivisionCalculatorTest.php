<?php

declare(strict_types=1);

namespace Tests\App\Service;

use App\Model\Number;
use App\Service\DivisionCalculator;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

final class DivisionCalculatorTest extends TestCase
{
    private DivisionCalculator $divisionCalculator;

    public function setUp(): void
    {
        $this->divisionCalculator = new DivisionCalculator();
    }

    public static function provideCalculatorValues(): \Generator
    {
        yield [10, 10, 1];
        yield [0, 1, 0];
        yield [-4, -7, 0.5714285714285714];
        yield [-2.5, -7.5, 0.3333333333333333];
    }

    #[DataProvider('provideCalculatorValues')]
    public function testCalculatesPackGroup(float $actualResult1, float $actualResult2, float $expectedResult): void
    {
        $number1 = new Number($actualResult1);
        $number2 = new Number($actualResult2);
        $result = $this->divisionCalculator->calculate($number1, $number2);
        self::assertSame($expectedResult, $result);
    }

    public function testCannotCreateWeightWithZero():void
    {
        $this->expectException(\Exception::class);
        $this->divisionCalculator->calculate(new Number(1), new Number(0));
    }
}