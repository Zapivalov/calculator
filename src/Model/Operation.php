<?php

declare(strict_types=1);

namespace App\Model;

enum Operation: string
{
    case PLUS = '+';
    case MINUS = '-';
    case MULTIPLICATION = '*';
    case DIVISION = '/';
}