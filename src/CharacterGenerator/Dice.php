<?php declare(strict_types=1);

namespace App\CharacterGenerator;

class Dice
{
    public const D3_MIN = 1;
    public const D3_MAX = 3;
    public const D6_MIN = 1;
    public const D6_MAX = 6;
    public const D10_MIN = 1;
    public const D10_MAX = 10;
    public const D100_MIN = 1;
    public const D100_MAX = 100;

    public static function d3(int $v): int
    {
        return random_int(self::D3_MIN, self::D3_MAX) * $v;
    }

    public static function d6(int $v): int
    {
        return random_int(self::D6_MIN, self::D6_MAX) * $v;
    }

    public static function d10(int $v): int
    {
        return random_int(self::D10_MIN, self::D10_MAX) * $v;
    }

    public static function d100(int $v): int
    {
        return random_int(self::D100_MIN, self::D100_MAX) * $v;
    }



}