<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     * Return "true" to allow all users to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    
     // These rules ensure the data provided in the form meets specific requirements.
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255', // Ensures "name" is required, a string, and no longer than 255 characters
            'description' => 'nullable|string', // Allows "description" to be null or a string
            'price' => 'required|numeric|min:0', // Ensures "price" is required, a number, and greater than or equal to 0
            'quantity' => 'required|integer|min:0', // Ensures "quantity" is required, an integer, and greater than or equal to 0
        ];
    }
}