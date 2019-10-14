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
    public function rules($request)
    {
        return [
            'proveedor_id.*.factura' => 'required|unique:entrada, factura_unica',
            'factura' => 'required|max:30', $this->route('id'),
            'fecha' => 'required',
            'fecha_venci' => '',
            'forma_pago' => 'required|max:7',
            'estado' => 'required|max:1',
            'total' => 'numeric|digits_between:1,10',
            'iva' => 'numeric|digits_between:1,10'
        ];
    }
}
