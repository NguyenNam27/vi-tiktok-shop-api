<?php

namespace App\Http\Requests;

use App\Enums\RolesEnum;
use App\Enums\UserTypesEnum;
use App\Traits\HtqRequest;
use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
    use HtqRequest;

    protected function getModel() : string
    {
        return 'User';
    }

    // public function getValidatorInstance()
    // {
    //     $this->formatUserType();

    //     parent::getValidatorInstance();
    // }

    protected function prepareForValidation()
    {
        if (!$this->has('user_type')) {
            $this->merge([
                'user_type' => (string)UserTypesEnum::walk_in(),
            ]);
        }
//        if (!$this->has('roles')) {
//            $this->merge([
//                'roles' => (string)RolesEnum::guest(),
//            ]);
//        }
    }
}
