<?php

namespace App\Http\Controllers;

use App\Models\Products;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.products');
    }
    /**
     * Fetch a listing of the resource.
     */
    public function getProducts()
    {
        $data = Products::paginate(25);

        return response()->json([
            'data' => $data,
            'message' => 'OK!',
            'success' => true
        ], 200);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function storeProducts(Request $request)
    {
        $validated = $request->validate([
            'name'           => 'required|string|max:255',
            'sku'            => 'nullable|string|max:255|unique:products,sku',
            'purchase_price' => 'required|numeric|min:0',
            'sale_price'     => 'required|numeric|min:0',
            'quantity'       => 'required|numeric|min:0',
            'unit'           => 'required|string|max:50',
        ]);

        Products::create($validated);

        return redirect()->back()->with('success', 'Product Added!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
