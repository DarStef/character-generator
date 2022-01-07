<?php declare(strict_types=1);

namespace App\Form\Enum;

enum Sex: string
{
    case Male = 'M';
    case Female = 'W';
    case None = 'N';

    public static function rand(): self
    {
        if (random_int(0, 1) === 0) {
            return self::Male;
        }
        return self::Female;
    }
}