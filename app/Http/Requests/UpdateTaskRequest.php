<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateTaskRequest extends FormRequest
{
    public function authorize()
    {
        return true; // Permite accesul pentru toți utilizatorii
    }

    public function rules()
    {
        return [
            'title' => 'required|string|min:3',
            'description' => 'nullable|string|max:500',
            'due_date' => 'required|date|after_or_equal:' . now()->toDateString(),
            'category_id' => 'required|exists:categories,id',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Titlul este obligatoriu.',
            'title.min' => 'Titlul trebuie să aibă cel puțin 3 caractere.',
            'due_date.required' => 'Data limită este obligatorie.',
            'due_date.after_or_equal' => 'Data limită trebuie să fie cel puțin astăzi.',
            'category_id.required' => 'Selectează o categorie.',
            'category_id.exists' => 'Categoria selectată nu există.',
        ];
    }
}

