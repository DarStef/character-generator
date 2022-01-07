<?php declare(strict_types=1);

namespace App\Form\Enum;

enum Profession: string
{
    case Liberian = 'Bibliotekarz';
    case Liberian2 = 'Bibliotekarz2';
    case Liberian3 = 'Bibliotekarz3';

    public static function rand(): self
    {
        return self::cases()[random_int(0, count(self::cases()))-1];
    }
}