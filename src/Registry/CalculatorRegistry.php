<?php

declare(strict_types=1);

namespace App\Registry;

use App\Model\Operation;
use App\Service\CalculatorInterface;

final class CalculatorRegistry
{
    private array $calculators;

    public function register(string $key, CalculatorInterface $calculator): void
    {
        $this->calculators[$key] = $calculator;
    }

    public function resolve(Operation $key): CalculatorInterface
    {
        return $this->calculators[$key->value] ?? throw new \Exception('Calculator not found!');
    }
}
