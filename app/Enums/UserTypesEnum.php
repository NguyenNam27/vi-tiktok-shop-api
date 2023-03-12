<?php

namespace App\Enums;

use App\Traits\HtqEnumUpperCase;
use Spatie\Enum\Laravel\Enum;

/**
 * @method static self admin()
 * @method static self staff()
 * @method static self shop()
 * @method static self customer()
 * @method static self delivery_hero()
 * @method static self walk_in()
 */
final class UserTypesEnum extends Enum
{
    use HtqEnumUpperCase;
}
