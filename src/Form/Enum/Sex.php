<?php declare(strict_types=1);

namespace App\Form\Enum;

enum Sex: string
{
    case Men = 'M';
    case Women  = 'W';
    case None = 'N';
    case Undefined = 'U';
}