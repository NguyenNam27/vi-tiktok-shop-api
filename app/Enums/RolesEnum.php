<?php

namespace App\Enums;

use App\Traits\HtqEnumUpperCase;
use Spatie\Enum\Laravel\Enum;

/**
 * @method static self root()
 * @method static self admin()
 * @method static self shop()
 * @method static self sales()
 * @method static self subscriber()
 * @method static self guest()
 */
final class RolesEnum extends Enum
{
    use HtqEnumUpperCase;
}
