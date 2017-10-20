<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProfesorFormRequest extends FormRequest
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
        'cardex'=>'required|max:10',
        'password'=>'required|string|min:6|confirmed',
        'passwordEdit'=>'max:255',
        'emailEdit'=>'max:65|email',
        'email'=>'max:100|email|unique:profesores'
        ];
    }
}
