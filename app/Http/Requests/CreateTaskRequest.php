<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateTaskRequest extends FormRequest
{
    /**
     * Determină dacă utilizatorul este autorizat să facă această cerere.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Reguli de validare aplicate cererii.
     */
    public function rules(): array
    {
        return [
            'title' => 'required|string|min:3',
            'description' => 'nullable|string|max:500',
            'due_date' => 'required|date|after_or_equal:today',
            'category_id' => 'required|exists:categories,id',
        ];
    }

    /**
     * Mesaje de eroare personalizate.
     */
    public function messages(): array
    {
        return [
            'title.required' => 'Titlul este obligatoriu.',
            'title.min' => 'Titlul trebuie să aibă cel puțin 3 caractere.',
            'description.max' => 'Descrierea nu poate avea mai mult de 500 de caractere.',
            'due_date.required' => 'Data limită este obligatorie.',
            'due_date.after_or_equal' => 'Data limită trebuie să fie cel puțin astăzi.',
            'category_id.required' => 'Categoria este obligatorie.',
            'category_id.exists' => 'Categoria selectată nu există.',
        ];
    }
}

