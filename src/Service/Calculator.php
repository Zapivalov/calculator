<?php

declare(strict_types=1);

namespace App\Service;

use App\Registry\CalculatorRegistry;
use App\Request\CalculatorRequest;

final class Calculator
{
    public function __construct(
        private readonly CalculatorRegistry $calculatorRegistry,
    ) {
    }

    public function calculate(CalculatorRequest $request): string
    {
        $calculator = $this->calculatorRegistry->resolve($request->operation());
        $result = $calculator->calculate($request->argument1(), $request->argument2());

        return sprintf('%s %s %s = %s', $request->argument1()->value, $request->operation()->value, $request->argument2()->value, $result);
    }
}