<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TransactionsDetail;
use App\Http\Controllers\Controller;
use App\Models\Products;
use App\Models\Transactions;

class TransactionDetailController extends Controller
{
    public function index()
    {
        $details = TransactionsDetail::with(['transaction', 'product'])->get();
        $transactions = Transactions::all(); // Data transaksi untuk dropdown
        $products = Products::all(); // Data produk untuk dropdown
        $total_transactiondetail = TransactionsDetail::count();
        return view('pages.data-transactiondetail.index', compact('details', 'transactions', 'products','total_transactiondetail'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'transaction_id' => 'required|exists:transactions,id',
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
        ]);

        $product = Products::find($request->product_id);

        $total_price = $product->price * $request->quantity;

        TransactionsDetail::create([
            'transaction_id' => $request->transaction_id,
            'product_id' => $request->product_id,
            'quantity' => $request->quantity,
            'total_price' => $total_price,
        ]);

        return redirect()->route('data-transactiondetail.index')->with('success', 'Detail transaksi berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $detail = TransactionsDetail::findOrFail($id);
        $transactions = Transactions::all();
        $products = Products::all();

        return view('data-transactiondetail.edit', compact('detail', 'transactions', 'products'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'transaction_id' => 'required|exists:transactions,id',
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
        ]);

        $detail = TransactionsDetail::findOrFail($id);
        $product = Products::find($request->product_id);

        $total_price = $product->price * $request->quantity;

        $detail->update([
            'transaction_id' => $request->transaction_id,
            'product_id' => $request->product_id,
            'quantity' => $request->quantity,
            'total_price' => $total_price,
        ]);

        return redirect()->route('data-transactiondetail.index')->with('success', 'Detail transaksi berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $detail = TransactionsDetail::findOrFail($id);
        $detail->delete();

        return redirect()->route('data-transactiondetail.index')->with('success', 'Detail transaksi berhasil dihapus!');
    }
}
