<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AlumnoFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name'=>'required|max:100',
            'password'=>'required|string|min:6|confirmed',
            'email'=>'max:65|email|unique:alumnos',
            'passwordEdit'=>'min:6|max:255',
            'emailEdit'=>'max:65|email'
        ];
    }
}
//|email