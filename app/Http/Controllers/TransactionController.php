<?php

namespace App\Http\Controllers;

use App\Models\Customers;
use App\Models\Transactions;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function index()
    {
        $transaction = Transactions::with('customer')->get();
        $customers = Customers::all(); // Data untuk dropdown pelanggan
        $total_transaction = Transactions::count();
        return view('pages.data-transaction.index', compact('transaction', 'customers','total_transaction'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'customer_id' => 'required|exists:customers,id',
            'date' => 'required|date',
        ]);

        Transactions::create($request->all());

        return redirect()->route('data-transaction.index')->with('success', 'Order added successfully!');
    }

    public function edit($id)
    {
        $transaction = Transactions::findOrFail($id);
        $customers = Customers::all();
        return view('data-transaction.edit', compact('transaction', 'customers'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'customer_id' => 'required|exists:customers,id',
            'date' => 'required|date',
        ]);

        $transaction = Transactions::findOrFail($id);
        $transaction->update($request->all());

        return redirect()->route('data-transaction.index')->with('success', 'transaction updated successfully!');
    }

    public function destroy($id)
    {
        $transaction = Transactions::findOrFail($id);
        $transaction->delete();

        return redirect()->route('data-transaction.index')->with('success', 'transaction deleted successfully!');
    }
}
