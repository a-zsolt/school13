<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreBookRequest extends FormRequest
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
            'title' => 'required|string|max:120|min:3|unique:books,title',
            'author' => 'required|string|max:80|min:3',
            'published_year' => 'required|integer|min:1450|max:' . date('Y'),
            'price' => 'required|integer|max:2000000|min:0',

        ];
    }

    public function after(): array
    {
        return [
            function ($validator) {
                if ($this->published_year == date('Y') && $this->price == 0) {
                    $validator->errors()->add('price', 'Az idei kiadású könyv ára nem lehet 0.');
                }
            }
        ];
    }

    public function messages(): array
    {
        return [
            'title.required' => 'A cím megadása kötelző!',
            'title.max' => 'A cím maximum 120 karakter lehet!',
            'title.min' => 'A cím minimum 3 karakternek kell lennie!',
            'title.unique' => 'A címnek egyedinek kell lennie!',

            'author.required' => 'A szerző megadása kötelző!',
            'author.max' => 'A szerző maximum 50 karakter lehet!',

            'published_year.required' => 'Az évszám megadása kötelző!',
            'published_year.integer' => 'Az évszámnak számnak kell lennie!',
            'published_year.max' => 'Maximum 2026 lehet a megjelenés éve!',
            'published_year.min' => 'Minimum a mostani év lehet a megjelenés éve',

            'price.required' => 'Az ár megadása kötelező!',
            'price.integer' => 'Az árnak számnak kell lennie!',
            'price.max' => 'Az ár maximum 2000000!',
            'price.min' => 'Az ár minimum 0!',
        ];
    }

    public function attributes(): array
    {
        return [
            'title' => 'Cím',
            'author' => 'Szerző',
            'published_year' => 'Megjelenés éve',
            'price' => 'Ár',
        ];
    }
}
