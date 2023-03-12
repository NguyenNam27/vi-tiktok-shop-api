<?php

namespace App\Enums;

use App\Traits\HtqEnumUpperCase;
use Spatie\Enum\Laravel\Enum;

/**
 * @method static self user_create()
 * @method static self user_read()
 * @method static self user_update()
 * @method static self user_delete()
 *
 * @method static self role_create()
 * @method static self role_read()
 * @method static self role_update()
 * @method static self role_delete()
 *
 * @method static self permission_create()
 * @method static self permission_read()
 * @method static self permission_update()
 * @method static self permission_delete()
 *
 * @method static self warehouse_create()
 * @method static self warehouse_read()
 * @method static self warehouse_update()
 * @method static self warehouse_delete()
 *
 * @method static self attribute_create()
 * @method static self attribute_read()
 * @method static self attribute_update()
 * @method static self attribute_delete()
 *
 * @method static self category_create()
 * @method static self category_read()
 * @method static self category_update()
 * @method static self category_delete()
 *
 * @method static self order_create()
 * @method static self order_read()
 * @method static self order_update()
 * @method static self order_delete()
 *
 * @method static self orderdetail_create()
 * @method static self orderdetail_read()
 * @method static self orderdetail_update()
 * @method static self orderdetail_delete()
 *
 * @method static self brand_create()
 * @method static self brand_read()
 * @method static self brand_update()
 * @method static self brand_delete()
 *
 * @method static self images_create()
 * @method static self images_read()
 * @method static self images_update()
 * @method static self images_delete()
 *
 * @method static self shipmethod_create()
 * @method static self shipmethod_read()
 * @method static self shipmethod_update()
 * @method static self shipmethod_delete()
 *
 * @method static self product_create()
 * @method static self product_read()
 * @method static self product_update()
 * @method static self product_delete()
 *
 * @method static self paymentmethod_create()
 * @method static self paymentmethod_read()
 * @method static self paymentmethod_update()
 * @method static self paymentmethod_delete()
 */



final class PermissionsEnum extends Enum
{
    use HtqEnumUpperCase;
}
