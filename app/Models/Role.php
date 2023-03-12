<?php

namespace App\Models;

use Spatie\Permission\Models\Role as SpatieRole;

class Role extends SpatieRole
{
    public function getRules() : array
    {
        return [
            'name' => ['required', 'unique:'.$this->getTable().',name,'.request()->id],
        ];
    }
}
