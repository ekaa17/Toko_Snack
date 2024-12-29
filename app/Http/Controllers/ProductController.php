<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Products;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    // Menampilkan daftar produk
    public function index()
    {
        $products = Products::all(); // Mengambil semua produk
        $hal_products = Products::paginate(10);
        $total_Products = $products->count();
        return view('pages.data-product.index', compact('products', 'total_Products','hal_products'));
    }

    // Menyimpan data produk baru
    public function store(Request $request)
    {
        // Validasi input
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
        ]);

        // Menambahkan produk baru
        Products::create($validated);

        return redirect()->route('data-product.index')->with('success', 'Produk berhasil ditambahkan.');
    }

    // Menampilkan form edit produk
    public function edit($id)
    {
        $product = Products::findOrFail($id);
        return response()->json($product); // Mengembalikan data produk dalam format JSON untuk modal edit
    }

    // Mengupdate data produk
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
        ]);

        $product = Products::findOrFail($id);
        $product->update($validated);

        return redirect()->route('data-product.index')->with('success', 'Produk berhasil diperbarui.');
    }

    // Menghapus produk
    public function destroy($id)
    {
        $product = Products::findOrFail($id);
        $product->delete();

        return redirect()->route('data-product.index')->with('success', 'Produk berhasil dihapus.');
    }
}
