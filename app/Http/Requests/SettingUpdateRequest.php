<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SettingUpdateRequest extends FormRequest
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
            'balancing' => 'required',
            'limit_per_team' => 'required',
        ];
    }

    public function messages(): array
    {
        return [
            'balancing.required' => 'O campo Balanceamento é obrigatório.',
            'limit_per_team.required' => 'O campo Limite por time é obrigatório.',
        ];
    }
}
