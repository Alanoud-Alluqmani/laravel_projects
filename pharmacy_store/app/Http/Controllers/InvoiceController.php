<?php

namespace App\Http\Controllers;

use App\Models\Invoice; 
use Illuminate\Http\Request; 
use App\Models\Order_item; 
use App\Models\Product; 
use App\Models\Order; 
use GuzzleHttp\Promise\Create; 
use App\Http\Requests\CreateInvoiceRequest; 

class InvoiceController extends Controller
{
    
     // Retrieve all invoices with their related orders.
    public function index()
    {
        $invoices = Invoice::with('order')->get(); // Eager load related orders
        return response()->json($invoices); // Return all invoices as a JSON response
    }

    
     // Fetch a specific invoice by its ID along with its related order.
    public function show($id)
    {
        $invoice = Invoice::with('order')->findOrFail($id); // Eager load related order for the invoice
        return response()->json($invoice); // Return the specific invoice as a JSON response
    }
}
