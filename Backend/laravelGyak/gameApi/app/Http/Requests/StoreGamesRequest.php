<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreGamesRequest extends FormRequest
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
            'title' => 'required|string|max:255',
            'release_year' => 'required|integer|min:1900|max:'. date('Y'),
            'developer' => 'required|string|max:255',
            'genre' => ['required', Rule::in(['Action', 'Adventure', 'RPG', 'Strategy', 'Sports', 'Simulation', 'Other']) ,'max:255'],
            'score' => 'required|integer|min:0|max:100',
            'price' => 'required|integer|min:0|max:500',
        ];
    }
}
