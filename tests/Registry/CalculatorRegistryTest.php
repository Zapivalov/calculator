<?php

declare(strict_types=1);

namespace Tests\App\Registry;

use App\Model\Operation;
use App\Registry\CalculatorRegistry;
use App\Service\AdditionCalculator;
use PHPUnit\Framework\TestCase;

final class CalculatorRegistryTest extends TestCase
{
    private readonly CalculatorRegistry $calculatorRegistry;

    public function setUp(): void
    {
       $this->calculatorRegistry = new CalculatorRegistry();
       $this->calculatorRegistry->register('+', new AdditionCalculator());
    }

    public function testResolvesCalculator(): void
    {
        $calculator = $this->calculatorRegistry->resolve(Operation::PLUS);
        self::assertEquals(new AdditionCalculator(), $calculator);
    }
}