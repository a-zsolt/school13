<?php

namespace App\Http\Requests;

use App\Models\Challange;
use Illuminate\Foundation\Http\FormRequest;

class StoreSubssionRequest extends FormRequest
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
            'team_id' => ['required', 'exists:teams,id'],
            'challange_id' => ['required_without:challenge_id', 'exists:challanges,id'],
            'points' => ['required', 'numeric', 'min:1'],
        ];
    }

    public function after(): array
    {
        return [
            function ($validator) {
                $challangeId = $this->input('challange_id') ?? $this->input('challenge_id');
                $points = $this->input('points');

                if ($challangeId && $points !== null) {
                    $challange = Challange::find($challangeId);
                    if ($challange && $points > $challange->max_points) {
                        $validator->errors()->add(
                            'points',
                            'A pontszám nem lehet nagyobb, mint a feladat maximum pontszáma (' . $challange->max_points . ' p).'
                        );
                    }
                }
            }
        ];
    }

    public function messages(): array
    {
        return [
            'team_id.exists' => 'Nem létezik a megadott csapat!',
            'team_id.required' => 'A csapatot kötelező megadni!',

            'challange_id.exists' => 'Nem létezik a megadott feladat!',

            'points.min' => 'Legalább egy pontot el kell érni!',
            'points.numeric' => 'A pontszám csak szám lehet!',
            'points.required' => 'A pontszámot kötelező megadni!'
        ];
    }
}


