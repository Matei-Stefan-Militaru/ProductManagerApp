<?php

namespace App\Http\Controllers;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    // This method handles the redirect logic based on the selected action
    public function redirect(Request $request)
    {
        $action = $request->input('action');
        $productId = $request->input('product_id');

        switch ($action) {
            case 'create':
                return redirect()->route('products.create');
            case 'edit':
                if (!$productId) {
                    return back()->withErrors(['product_id' => 'Product ID is required for editing']);
                }
                return redirect()->route('products.edit', ['product' => $productId]);
            case 'show':
                if (!$productId) {
                    return back()->withErrors(['product_id' => 'Product ID is required for showing']);
                }
                return redirect()->route('products.show', ['product' => $productId]);
            case 'index':
                return redirect()->route('products.index');
            default:
                return redirect('/');
        }
    }
    
     public function index()
    {
        $products = Product::paginate(10);
        return view('products.index', compact('products'));
    }

    public function create()
    {
        return view('products.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'description' => 'required',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'category' => 'required|max:255',
            'image_url' => 'nullable|url'
        ]);

        Product::create($validated);
        return redirect()->route('products.index')->with('success', 'Product created successfully');
    }

    public function edit(Product $product)
    {
        return view('products.edit', compact('product'));
    }

    public function update(Request $request, Product $product)
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'description' => 'required',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'category' => 'required|max:255',
            'image_url' => 'nullable|url'
        ]);

        $product->update($validated);
        return redirect()->route('products.index')->with('success', 'Product updated successfully');
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('products.index')->with('success', 'Product deleted successfully');
    }
        
}