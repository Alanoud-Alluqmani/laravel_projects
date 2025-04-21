<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

// Define the "CreateInvoiceRequest" class extending Laravel's "FormRequest" class
class CreateInvoiceRequest extends FormRequest
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
            'items' => 'required|array', // Validates that "items" is required and must be an array
            'items.*.product_id' => 'required|exists:products,id', // Ensures each item's product ID exists in the "products" table
            'items.*.quantity' => 'required|integer|min:1', // Validates each item's quantity is required, an integer, and at least 1
        ];
    }
}