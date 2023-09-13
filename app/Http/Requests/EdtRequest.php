<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EdtRequest extends FormRequest
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
            'label' =>'required|string',
            'room' => 'required|string',
            'teacher' =>'nullable|string',
            'date' => 'required|date',
            'begin' => 'required|date_format:H:i',
            'end' => 'required|date_format:H:i|after:begin',
            'formation_id' => 'required|integer|exists:formations,id',
            'group.*' => 'required|integer|exists:groups,id',

        ];
    }
}
