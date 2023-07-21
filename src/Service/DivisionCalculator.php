<?php

declare(strict_types=1);

namespace App\Service;

use App\Model\Number;
use Exception;

final class DivisionCalculator implements CalculatorInterface
{
    public function calculate(Number $argument1, Number $argument2): float
    {
        if ($argument2->isZero()) {
            throw new Exception('Деление на ноль');
        }

        return $argument1->value / $argument2->value;
    }
}
