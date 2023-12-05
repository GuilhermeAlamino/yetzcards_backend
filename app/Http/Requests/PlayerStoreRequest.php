<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PlayerStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return  [
            'name' => 'required',
            'nivel' => 'required',
            'goalkeeper' => 'required',
            'confirmed' => 'required',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'O campo Nome é obrigatório.',
            'nivel.required' => 'O campo Nivel é obrigatório.',
            'goalkeeper.required' => 'O campo Goleiro é obrigatório.',
            'confirmed.required' => 'O campo Confirmado é obrigatório.',
        ];
    }
}
