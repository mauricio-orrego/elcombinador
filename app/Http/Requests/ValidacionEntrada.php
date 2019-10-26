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
            'factura & proveedor_id' => 'required|unique:entrada,factura, proveedor_id,',
            'fecha' => 'required',
            'fecha_venci' => '',
            'forma_pago' => 'required|max:7',
            'estado' => '',
            'total' => '',
            'iva' => '',
            
        ];
        
    }
    
    /*public function messages()
    {
        return [
            'factura_unica.same' =>  'That file no longer exists or is invalid'
        ];
    }
    */
}
