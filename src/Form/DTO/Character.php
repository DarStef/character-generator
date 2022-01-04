<?php declare(strict_types=1);

namespace App\Form\DTO;

use App\Form\Enum\Profession;
use App\Form\Enum\Sex;
use App\Form\Enum\Type;

class Character
{
    public ?string $name = null;
    public ?string $surname = null;
    public ?Sex $sex = null;
    public ?Profession $profession = null;
    public ?Type $type = null;
}
