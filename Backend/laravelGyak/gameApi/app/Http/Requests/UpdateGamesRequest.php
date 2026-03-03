<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateGamesRequest extends FormRequest
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
            'title' => 'string|max:255',
            'release_year' => 'integer|min:1900|max:'. date('Y'),
            'developer' => 'string|max:255',
            'genre' => [ Rule::in(['Action', 'Adventure', 'RPG', 'Strategy', 'Sports', 'Simulation', 'Other']) ,'max:255'],
            'score' => 'integer|min:0|max:100',
            'price' => 'integer|min:0|max:500',
        ];
    }
}
