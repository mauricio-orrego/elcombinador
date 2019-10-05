<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidacionProducto extends FormRequest
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
    {//id	nombre	costo	valorventa	bodega_id	categoria_id
        return [
            'nombre' => 'required|max:100' . $this->route('id'),
            'costo' => 'required|numeric|digits_between:1,11',
            'valorventa' => 'required|numeric|digits_between:1,11',
            'bodega_id' => 'required',
            'categoria_id' => 'required'
        ];
    }
}
