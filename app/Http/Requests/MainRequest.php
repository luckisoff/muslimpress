<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;

class MainRequest extends FormRequest
{
    
    public function authorize()
    {
        if(isAdmin() || isWritter()){
            return true;
        }

        return true;
    }

    protected function failedValidation(Validator $validator) {
        throw new \Exception($validator->errors()->first());
        // throw new HttpResponseException(response()->json());
    }

}
