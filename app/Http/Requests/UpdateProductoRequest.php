<?php

namespace CorporacionPeru\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductoRequest extends FormRequest
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
            'nombre'          =>'required|min: 3|max: 64|regex:/^[ a-zA-ZÀ-ÿ0-9\x{00f1}\x{00d1}\.\-]*$/',
            'material'        =>'required|numeric|gt:0',
            'unidad_medida'   =>'required|numeric|gte:0',
            'descripcion'     =>'nullable|min: 3|max: 200|regex:/^[ a-zA-ZÀ-ÿ0-9\x{00f1}\x{00d1}]*$/',
            'image'           =>'nullable|image|mimes:png,jpg|max:2048',
            'precio_unitario' =>'required|numeric|gt:0',
            'categoria_id'    =>'required',
            'insumo'          =>'required|array|min:1',
            'insumo.*'        =>'required|distinct',
            'qty'             =>'required|array|min:1',
            'qty.*'           =>'required',
        ];
    }
}
