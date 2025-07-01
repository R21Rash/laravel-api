<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();

        return response()->json([
            'status' => true,
            'message' => 'Products fetched successfully',
            'data' => $products
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
        ]);

        $product = Product::create($validated);

        return response()->json([
            'status' => true,
            'message' => 'Product created successfully',
            'data' => $product
        ], 201);
    }

    public function show($id)
    {
        $product = Product::findOrFail($id);

        return response()->json([
            'status' => true,
            'message' => 'Product fetched successfully',
            'data' => $product
        ]);
    }

    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        $product->update($request->only(['name', 'price', 'stock']));

        return response()->json([
            'status' => true,
            'message' => 'Product updated successfully',
            'data' => $product
        ]);
    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        return response()->json([
            'status' => true,
            'message' => 'Product deleted successfully'
        ]);
    }
}
