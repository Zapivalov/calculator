<?php

declare(strict_types=1);

namespace App\Service;

use App\Model\Number;

interface CalculatorInterface
{
    public function calculate(Number $argument1, Number $argument2): float;
}
