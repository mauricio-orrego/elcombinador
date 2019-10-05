<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidacionEntrada extends FormRequest
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
            'proveedor_id' => 'required',
            'factura' => 'required|max:30|unique:entrada,factura,' . $this->route('id'),
            'fecha' => 'required',
            'fecha_venci' => '',
            'forma_pago' => 'required|max:7',
            'estado' => 'required|max:1',
            'total' => 'numeric|digits_between:1,10',
            'iva' => 'numeric|digits_between:1,10'
        ];
    }
}
