<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTeamRequest extends FormRequest
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
        return [
            'name' => ['required', 'min: 2', 'max: 80', 'unique:teams,name']
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Név mezőt kötelező kitölteni!',
            'name.min' => 'A névnek minimum 2 karakternek kell lennie!',
            'name.max' => 'A névnek maximum 80 karakternek kell lennie!',
            'name.unique' => 'Már van ilyen névvel csapat!'
        ];
    }
}
