<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreChallengeRequest extends FormRequest
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
            'title' => ['required', 'min: 2', 'max: 120'],
            'max_points' => ['required', 'integer', 'min: 1', 'max: 1000']
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'A cím megadása kötelező!',
            'title.min' => 'A címnek minimum 2 karakter hosszúnak kell lennie!',
            'title.max' => 'A címnek maximum 120 karakter hosszúnak kell lennie!',

            'max_points.required' => 'A max pont megadása kötelező!',
            'max_points.integer' => 'A max pontnak számnak kell lennie!',
            'max_points.min' => 'A max pont minimum 1!',
            'max_points.max' => 'A max pont maximum 1000!'
        ];
    }
}
