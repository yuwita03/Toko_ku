<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        // Search
        $query = Product::query();
        if ($request->search) {
            $query->where('name', 'like', '%'.$request->search.'%');
        }
        $products = $query->paginate(10);
        $totalProducts = Product::count();
        return view('products.index', compact('products', 'totalProducts'));
    }

    public function create()
    {
        return view('products.create');
    }

    public function show(Product $product)
    {
        return view('products.show', compact('product'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'barcode' => 'nullable',
            'category' => 'nullable',
            'stock' => 'required|integer',
            'sell_price' => 'required|integer',
            'cost_price' => 'required|integer',
            'image_file' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'image_url' => 'nullable|url',
            'description' => 'nullable|string'
        ]);
        $validated['profit'] = $validated['sell_price'] - $validated['cost_price'];

        // Prioritaskan file upload, jika tidak ada pakai link
        $imagePath = null;
        if ($request->hasFile('image_file')) {
            $imageName = time().'.'.$request->image_file->extension();
            $request->image_file->move(public_path('images'), $imageName);
            $imagePath = 'images/'.$imageName;
        } elseif ($request->filled('image_url')) {
            $imagePath = $request->input('image_url');
        }
        $validated['image'] = $imagePath;

        Product::create($validated);

        return redirect()->route('admin.products.index')->with('success', 'Produk berhasil ditambahkan!');
    }

    public function edit(Product $product)
    {
        return view('products.edit', compact('product'));
    }

    public function update(Request $request, Product $product)
    {
        $validated = $request->validate([
            'name' => 'required',
            'barcode' => 'nullable',
            'category' => 'nullable',
            'stock' => 'required|integer',
            'sell_price' => 'required|integer',
            'cost_price' => 'required|integer',
            'image_file' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'image_url' => 'nullable|url',
            'description' => 'nullable|string'
        ]);
        $validated['profit'] = $validated['sell_price'] - $validated['cost_price'];

        // Jika ada file baru, pakai file. Jika tidak, cek url. Jika tidak, pakai gambar lama.
        $imagePath = $product->image;
        if ($request->hasFile('image_file')) {
            $imageName = time().'.'.$request->image_file->extension();
            $request->image_file->move(public_path('images'), $imageName);
            $imagePath = 'images/'.$imageName;
        } elseif ($request->filled('image_url')) {
            $imagePath = $request->input('image_url');
        }
        $validated['image'] = $imagePath;

        $product->update($validated);

        return redirect()->route('admin.products.index')->with('success', 'Produk berhasil diupdate!');
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('admin.products.index')->with('success', 'Produk berhasil dihapus!');
    }
}
