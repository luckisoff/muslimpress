<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends MainRequest
{
    public function rules()
    {
        return [
            'name'  => 'required',
            'en'    => 'required',
            'hi'    => 'required',
            'image' => 'mimes:jpg,jpeg,png'
        ];
    }
}
