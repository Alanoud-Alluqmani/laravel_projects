<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Models\Order_item;
use App\Models\Product;
use App\Http\Requests\CreateOrderRequest;
use App\Models\Invoice;

class OrderController extends Controller
{
    
     //Retrieve all orders with their related order items and associated products.
    public function index()
    {
        $orders = Order::with('order_items.product')->get(); // Eager load related order items and products
        return response()->json($orders); // Return all orders as a JSON response
    }

    // Store a new order along with its order items and create an associated invoice.
    public function store(CreateOrderRequest $request)
    {
        $validated = $request->validated(); // Retrieve validated data from the request

        // Create the order with the authenticated user's ID and an initial total price of 0
        $order = Order::create([
            'user_id' => $request->user()->id, // User who created the order
            'total_price' => 0, // Placeholder for total price (calculated below)
        ]);

        $totalPrice = 0; // Initialize total price

        // Loop through the items in the request to calculate total price and create order items
        foreach ($validated['items'] as $item) {
            $product = Product::find($item['product_id']); // Find the product by ID
            $subtotal = $product->price * $item['quantity']; // Calculate subtotal for the item
            $totalPrice += $subtotal; // Add subtotal to the total price

            // Create an order item for the current product
            Order_item::create([
                'order_id' => $order->id, // Associate the order item with the order
                'product_id' => $item['product_id'], // Product ID for the order item
                'quantity' => $item['quantity'], // Quantity of the product
                'price' => $subtotal, // Total price of the order item
            ]);
        }

        // Update the total price for the order
        $order->update(['total_price' => $totalPrice]);

        // Create an invoice for the order
        Invoice::create([
            'order_id' => $order->id, // Associate the invoice with the order
            'total_price' => $totalPrice, // Total price of the order
            'payment_status' => 'Pending', // Default payment status
        ]);

        // Return a success response
        return response()->json([
            'order' => $order, // Include the order in the response
            'message' => 'Order and invoice created successfully!',
        ]);
    }

    
     //Retrieve a specific order along with its related order items and products.
    public function show($id)
    {
        $order = Order::with('order_items.product')->findOrFail($id); // Fetch the order with its items and products
        return response()->json($order); // Return the order as a JSON response
    }
}
