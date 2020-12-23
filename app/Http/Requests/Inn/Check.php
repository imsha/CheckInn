<?php

namespace App\Http\Requests\Inn;

use Illuminate\Foundation\Http\FormRequest;

class Check extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    /**
     * @return string[]
     */
    public function rules()
    {
        return [
            'inn' => 'required|inn'
        ];
    }
}
