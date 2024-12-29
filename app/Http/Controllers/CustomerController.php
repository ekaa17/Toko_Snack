<?php

namespace App\Http\Controllers;

use App\Models\Customers;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index()
    {
        // Menampilkan semua data customer
        $customers = Customers::all();
        $total_customer = Customers::count();
        return view('pages.data-customer.index', compact('customers','total_customer'));
    }

    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:customers,email',
            'phone' => 'required|string|max:15',
        ]);

        // Menyimpan data customer
        Customers::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
        ]);

        return redirect()->route('data-customer.index')->with('success', 'Customer added successfully!');
    }

    public function edit($id)
    {
        // Menampilkan data customer untuk diubah
        $customer = Customers::findOrFail($id);
        return view('customers.edit', compact('customer'));
    }

    public function update(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:customers,email,' . $id,
            'phone' => 'required|string|max:15',
        ]);

        // Menyimpan perubahan data customer
        $customer = Customers::findOrFail($id);
        $customer->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
        ]);

        return redirect()->route('data-customer.index')->with('success', 'Customer updated successfully!');
    }

    public function destroy($id)
    {
        // Menghapus data customer
        $customer = Customers::findOrFail($id);
        $customer->delete();

        return redirect()->route('data-customer.index')->with('success', 'Customer deleted successfully!');
    }
}
