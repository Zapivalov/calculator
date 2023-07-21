<?php

declare(strict_types=1);

namespace App\Service;

use App\Model\Number;

final class MultiplicationCalculator implements CalculatorInterface
{
    public function calculate(Number $argument1, Number $argument2): float
    {
        return $argument1->value * $argument2->value;
    }
}
