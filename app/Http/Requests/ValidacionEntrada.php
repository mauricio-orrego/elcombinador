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
            'factura' => 'unique:entrada,factura, proveedor_id,',
            'fecha' => 'required',
        ];
    }
    
    public function messages()
    {
        return [
            'factura.unique' =>  'Este numero de factura ya existe'
        ];
    }
    
}
