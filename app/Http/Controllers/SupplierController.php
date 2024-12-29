<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use App\Models\Suppliers;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    public function index()
    {
        // Menampilkan semua data supplier
        $suppliers = Suppliers::all();
        $total_supplier = Suppliers::count();
        return view('pages.data-supplier.index', compact('suppliers','total_supplier'));
    }

    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'name' => 'required|string|max:255',
            'contact' => 'required|string|max:15',
        ]);

        // Menyimpan data supplier
        Suppliers::create([
            'name' => $request->name,
            'contact' => $request->contact,
        ]);

        return redirect()->route('data-supplier.index')->with('success', 'Supplier added successfully!');
    }

    public function edit($id)
    {
        // Menampilkan data supplier untuk diubah
        $supplier = Suppliers::findOrFail($id);
        return view('suppliers.edit', compact('supplier'));
    }

    public function update(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'name' => 'required|string|max:255',
            'contact' => 'required|string|max:15',
        ]);

        // Menyimpan perubahan data supplier
        $supplier = Suppliers::findOrFail($id);
        $supplier->update([
            'name' => $request->name,
            'contact' => $request->contact,
        ]);

        return redirect()->route('suppliers.index')->with('success', 'Supplier updated successfully!');
    }

    public function destroy($id)
    {
        // Menghapus data supplier
        $supplier = Suppliers::findOrFail($id);
        $supplier->delete();

        return redirect()->route('suppliers.index')->with('success', 'Supplier deleted successfully!');
    }
}
