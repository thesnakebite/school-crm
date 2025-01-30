<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SchoolRequest extends FormRequest
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
            'name' => 'required|string|max:100',
            'address' => 'required|string|max:255',
            'logo' => 'nullable|image|dimensions:min_width=200,min_height=200|max:2048', // max 2MB
            'email' => 'nullable|email',
            'phone' => 'nullable',
            'website' => 'nullable|url'
        ];
    }

    public function messages(): array
    {
        return [
            'logo.dimensions' => 'El logotipo debe tener un tamaño mínimo de 200x200 píxeles.',
            'logo.max' => 'El logotipo no debe pesar más de 2MB.'
        ];
    }
}
