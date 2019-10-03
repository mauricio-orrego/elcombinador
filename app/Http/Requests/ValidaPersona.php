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
         {//direccion	ciudad_id	telefono	celular	tipo_per_id
            return [
                'nombre' => 'required|max:100' . $this->route('id'),
                'apellido' => 'max:100',
                'documento' => 'numeric|max:50',
                'dv' => 'numeric|max:1',
                'tipo_doc_id' => 'required',
                'direccion' => 'required|max:100',
                'ciudad_id' => 'required',
                'telefono' => 'required|max:50',
                'celular' => 'required|max:50',
                'tipo_per_id' => 'required'
            ];
        }
    }
