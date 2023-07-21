<?php

declare(strict_types=1);

namespace Tests\App\Service;

use App\Model\Number;
use App\Service\MultiplicationCalculator;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

final class MultiplicationCalculatorTest extends TestCase
{
    private MultiplicationCalculator $multiplicationCalculator;

    public function setUp(): void
    {
        $this->multiplicationCalculator = new MultiplicationCalculator();
    }

    #[DataProvider('provideCalculatorValues')]
    public function testCalculatesPackGroup(float $actualResult1, float $actualResult2, float $expectedResult): void
    {
        $number1 = new Number($actualResult1);
        $number2 = new Number($actualResult2);
        $result = $this->multiplicationCalculator->calculate($number1, $number2);
        self::assertSame($expectedResult, $result);
    }

    public static function provideCalculatorValues(): \Generator
    {
        yield [10, 10, 100];
        yield [0, 1, 0];
        yield [-4, -7, 28];
        yield [-2.5, -7.5, 18.75];
    }
}