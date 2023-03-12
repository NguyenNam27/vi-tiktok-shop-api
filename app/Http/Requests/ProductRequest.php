<?php

namespace App\Http\Requests;

use App\Traits\HtqRequest;
use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{
    use HtqRequest;

    protected function getModel() : string
    {
        return 'Product';
    }
}
