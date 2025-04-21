<?php

namespace App\Http\Controllers;

use App\Models\Order_item; 
use Illuminate\Http\Request; 

class Order_itemController extends Controller
{
    
     // Display the specified order item.
    public function show(Order_item $order_item)
    {
        // Implement functionality to display details of a specific order item (currently empty)
    }

    
     // Show the form for editing the specified order item.
    public function edit(Order_item $order_item)
    {
        // Implement functionality to display a form for editing a specific order item (currently empty)
    }

    
     // Update the specified order item in storage.
    public function update(Request $request, $id)
    {
        $item = Order_item::findOrFail($id); // Find the order item by ID or fail if not found

        $validated = $request->validate([
            'quantity' => 'required|integer|min:1', // Validate the quantity input
        ]);

        $item->update(['quantity' => $validated['quantity']]); // Update the order item with the new quantity
        return response()->json([
            'item' => $item, // Include the updated item in the response
            'message' => 'Item updated successfully', // Success message
        ]);
    }

    
    // Remove the specified order item from storage.
    public function destroy($id)
    {
        $item = Order_item::findOrFail($id); // Find the order item by ID or fail if not found
        $item->delete(); // Delete the order item from the database

        return response()->json([
            'message' => 'Item removed successfully', // Success message
        ]);
    }
}