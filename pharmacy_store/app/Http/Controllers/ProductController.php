<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Requests\CreateProductRequest;
use App\Http\Requests\UpdateProductRequest;

class ProductController extends Controller
{
    // Retrieve all products from the database.
    public function index()
    {
        $products = Product::all(); // Fetch all products
        return response()->json([
            'data' => $products // Return the products in JSON format
        ]);
    }

     // Store a new product in the database.
    public function store(CreateProductRequest $request)
    {
        $product = Product::create($request->validated()); // Create a new product with validated data
        return response()->json([
            "message" => 'success' // Return success message in JSON format
        ]);
    }

    
     // Update an existing product in the database.
    public function update(UpdateProductRequest $request, $id)
    {
        $product = Product::findOrFail($id); // Find the product by ID or fail if not found
        $product->update($request->validated()); // Update the product with validated data
        return response()->json([
            'product' => $product, // Return the updated product
            'message' => 'Product updated successfully' // Success message
        ]);
    }

    
     // Delete an existing product from the database.
    public function destroy(string $id)
    {
        $product = Product::findOrFail($id); // Find the product by ID or fail if not found
        $product->delete(); // Delete the product
        return response()->json([
            "message" => 'Product deleted successfully' // Success message
        ]);
    }
}