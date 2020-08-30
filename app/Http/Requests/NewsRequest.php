<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NewsRequest extends MainRequest
{
    public function rules()
    {
        return [
            'title' => 'required',
            'summary'   => 'required|max:500',
            'content'   => 'required',
            'tags'  => 'required',
            'image' => 'mimes:jpg,jpeg,png'
        ];
    }
}
