<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GrupoFormRequest extends FormRequest
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
            'descripciong'=>'required|max:45',
            'id_turno'=>'required',
            'id_carrera'=>'required',
            'id_nivel'=>'max:65',
            'id_cuatrimestre'=>'required'
        ];
    }
}
//|email|unique:user


