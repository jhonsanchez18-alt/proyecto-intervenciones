<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreActivoRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true; // puedes controlar permisos luego
    }

    public function rules(): array
    {
        return [
            'nombre'              => 'required|string|max:255',
            'categoria_id'        => 'required|exists:categorias,id',
            'tipo_id'             => 'required|exists:tipos,id',
            'descripcion'         => 'nullable|string|max:255',
            'seccion_id'          => 'required|exists:seccions,id',
            'ubicacion_id'        => 'required|exists:ubicacions,id',
            'marca_id'            => 'required|exists:marcas,id',
            'modelo'              => 'nullable|string|max:100',
            'numerodeserie'       => 'nullable|string|max:100|unique:activos,numerodeserie',
            'fechacompra'         => 'required|date',
            'valorcompra'          => 'required|numeric|min:0',
            'estado_id'           => 'required|exists:estados,id',
            'responsable_id'      => 'required|exists:users,id',
            'identificadorunico'  => 'required|string|max:100|unique:activos,identificadorunico',
            'fecharegistro'      => 'nullable|date',
            'observaciones'       => 'nullable|string|max:500',
        ];
    }

    public function messages(): array
    {
        return [
            'nombre.required' => 'El nombre del activo es obligatorio.',
            'categoria_id.required' => 'Debe seleccionar una categoría.',
            'tipo_id.required' => 'Debe seleccionar un tipo.',
            'fechacompra.required' => 'La fecha de compra es obligatoria.',
            'valor_adquisicion.required' => 'Debe indicar el valor de compra.',
            'identificadorunico.unique' => 'Este identificador ya está registrado.',
            'numerodeserie.unique' => 'El número de serie ya existe.',
        ];
    }
}
