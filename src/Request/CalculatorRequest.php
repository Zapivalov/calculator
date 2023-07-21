<?php

declare(strict_types=1);

namespace App\Request;

use App\Model\Number;
use App\Model\Operation;
use Jrm\RequestBundle\Attribute\Body;

final class CalculatorRequest
{
 public function __construct(
     #[Body('argument_1')]
     private readonly string $argument1,
     #[Body('operation')]
     private readonly string $operation,
     #[Body('argument_2')]
     private readonly string $argument2,
    ) {
    }

    public function argument1(): Number
    {
        return Number::createFromString($this->argument1);
    }

    public function operation(): Operation
    {
        return Operation::from($this->operation);
    }

    public function argument2(): Number
    {
        return Number::createFromString($this->argument2);
    }
}