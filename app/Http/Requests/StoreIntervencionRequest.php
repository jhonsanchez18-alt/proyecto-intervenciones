<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreIntervencionRequest extends FormRequest
{
    /**
     * Determina si el usuario está autorizado
     */
    public function authorize(): bool
    {
        return true; // ya estás usando middleware auth
    }

    /**
     * Reglas de validación
     */
    public function rules(): array
    {
        return [
            'fecha_intervencion' => 'required|date',
            'tipo_intervencion'  => 'required|string|max:100',
            'observaciones'      => 'nullable|string|max:500',
            'tecnico_id'         => 'required|exists:tecnicos,id',
            'quien_recibe'       => 'required|string|max:150',
            // Checklists (opcional pero recomendado)
            'repuestos'          => ['nullable', 'array'],
            'repuestos.*'        => ['boolean'],

            'iten_intervenciones'          => ['nullable', 'array'],
            'iten_intervenciones.*'        => ['boolean'],
        ];
    }

    /**
     * Mensajes personalizados (opcional pero recomendado)
     */
    public function messages(): array
    {
        return [
            'fecha_intervencion.required' => 'La fecha de intervención es obligatoria.',
            'fecha_intervencion.date'     => 'La fecha de intervención no es válida.',

            'tipo_intervencion.required'  => 'Debe indicar el tipo de intervención.',
            'tipo_intervencion.max'       => 'El tipo de intervención no debe superar 100 caracteres.',

            'tecnico_id.required'         => 'Debe seleccionar un técnico.',
            'tecnico_id.exists'           => 'El técnico seleccionado no existe.',

            'quien_recibe.required'       => 'Debe indicar quién recibe el activo.',
            'quien_recibe.max'            => 'El nombre del receptor es demasiado largo.',
        ];
    }
}