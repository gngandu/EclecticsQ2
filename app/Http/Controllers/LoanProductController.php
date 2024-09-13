<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LoanProduct;

class LoanProductController extends Controller {

    /**
     * Display a listing of the resource.
     */
    public function index() {
        $loanProducts = LoanProduct::all();
        return view('loan-products.index', compact('loanProducts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() {
        return view('loan-products.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) {
        // Validate the request data
        $validated = $request->validate([
            'name' => 'required|string',
            'code' => 'required|string',
            'min_amount' => 'required|string',
            'max_amount' => 'required|string',
            'interest_rate' => 'required|string',
            'currency' => 'required|string',
        ]);

        // Create a new product
        LoanProduct::create($validated);

        // Redirect to the product list with a success message
        return redirect()->route('loan-products.index')->with('success', 'Product created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(LoanProduct $product) {
        return view('loan-products.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, LoanProduct $product) {
        // Validate the request data
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'code' => 'required|string',
            'min_amount' => 'required|string',
            'max_amount' => 'required|string',
            'interest_rate' => 'required|string',
            'currency' => 'required|string',
        ]);

        // Update the customer
        $product->update($validated);

        // Redirect to the customer list with a success message
        return redirect()->route('loan-products.index')->with('success', 'Loan Products updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id) {
        //
    }
}
