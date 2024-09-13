<?php

namespace App\Http\Controllers;

use App\Models\Loan;
use App\Models\Customer;
use App\Models\LoanProduct;
use Illuminate\Http\Request;

class LoanController extends Controller {

    /**
     * Display a listing of the resource.
     */
    public function index() {
        $loans = Loan::with('customer', 'product')->get();
        return view('loans.index', compact('loans'));
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() {
        $customers = Customer::all();
        $products = LoanProduct::all();
        return view('loans.create', compact('customers', 'products'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) {
        // Validate the request data
        $validated = $request->validate([
            'customer_id' => 'required|exists:customers,id',
            'product_id' => 'required|exists:loan_products,id',
            'amount_applied' => 'required|numeric|min:0',
        ]);

        // Fetch the selected loan product
        $product = LoanProduct::findOrFail($validated['product_id']);

        // Check if the amount is within the product's limits
        if ($validated['amount_applied'] < $product->min_amount || $validated['amount_applied'] > $product->max_amount) {
            return back()->withErrors(['amount_applied' => 'Loan amount must be within the product\'s limits.']);
        }

        // Create a new loan application with a 'pending' status
        Loan::create([
            'customer_id' => $validated['customer_id'],
            'product_id' => $validated['product_id'],
            'amount_applied' => $validated['amount_applied'],
            'status' => 'pending',
            'balance' => $validated['amount_applied'], // Initial balance equals the applied amount
        ]);

        // Redirect with a success message
        return redirect()->route('loans.index')->with('success', 'Loan application created successfully.');
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
    public function edit(string $id) {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id) {
        //
    }

    public function report() {
        $loans = Loan::with(['customer', 'product'])->get();
        return view('loans.report', compact('loans'));
    }

    /**
     * Remove the specified resource from storage.
     */

    /**
     * Approve the specified loan.
     */
    public function approve(Loan $loan) {
        // Ensure the loan is still pending
        if ($loan->status !== 'pending') {
            return back()->withErrors(['status' => 'Only pending loans can be approved.']);
        }

        // Approve the loan
        $loan->status = 'approved';
        $loan->save();

        // Redirect with a success message
        return redirect()->route('loans.index')->with('success', 'Loan approved successfully.');
    }

    /**
     * Disburse the approved loan.
     */
    public function disburse(Loan $loan) {
        // Ensure the loan is approved and not already disbursed
        if ($loan->status !== 'approved') {
            return back()->withErrors(['status' => 'Only approved loans can be disbursed.']);
        }

        // Disburse the loan
        $loan->status = 'disbursed';
        $loan->amount_disbursed = $loan->amount_applied; // Full disbursement of the applied amount
        $loan->save();

        // Redirect with a success message
        return redirect()->route('loans.index')->with('success', 'Loan disbursed successfully.');
    }

    /**
     * Track repayments and update the loan balance.
     */
    public function repay(Request $request, Loan $loan) {
        // Validate the repayment amount
        $validated = $request->validate([
            'amount_repaid' => 'required|numeric|min:0',
        ]);

        // Ensure the loan is disbursed before repayment
        if ($loan->status !== 'disbursed') {
            return back()->withErrors(['status' => 'Only disbursed loans can be repaid.']);
        }

        // Update the loan repayment and balance
        $loan->amount_repaid += $validated['amount_repaid'];
        $loan->balance = $loan->amount_disbursed - $loan->amount_repaid;

        // If the full amount is repaid, mark the loan as repaid
        if ($loan->balance <= 0) {
            $loan->status = 'repaid';
            $loan->balance = 0;
        }

        $loan->save();

        // Redirect with a success message
        return redirect()->route('loans.index')->with('success', 'Loan repayment recorded successfully.');
    }

    public function destroy(string $id) {
        //
    }
}
