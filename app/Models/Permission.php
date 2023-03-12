<?php

namespace App\Models;

use Spatie\Permission\Models\Permission as SpatiePermission;

class Permission extends SpatiePermission
{
    public function getRules() : array
    {
        return [

            'name' => ['required', 'unique:'.$this->getTable().',name,'.request()->id],
        ];

    }
}
