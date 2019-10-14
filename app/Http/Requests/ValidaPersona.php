<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidaPersona extends FormRequest
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
                'nombre' => 'required|max:100' . $this->route('id'),
                'apellido' => 'max:100',
                'documento' => 'numeric|digits_between:1,20|unique:persona,documento,',
                'dv' => 'digits_between:0,1',
                'tipo_doc_id' => 'required',
                'direccion' => 'required|max:100',
                'ciudad_id' => 'required',
                'telefono' => 'required|max:50',
                'celular' => 'max:50',
                'tipo_per_id' => 'required'
            ];
        }
    }
