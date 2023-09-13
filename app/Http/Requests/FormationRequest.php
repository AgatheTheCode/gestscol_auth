<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FormationRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'categorie' => 'required|string',
            'name' => 'required|string',
            'promotion' => 'required|integer',
            'option' => 'required|string',
            'begin' => 'nullable|date',
            'end' => 'nullable|date',
            //'end' => 'required_with:begin|date',
            'student.*' => 'required|integer|exists:students,id',
        ];
    }
}
