<?php

namespace App\Http\Controllers;

use App\Models\Suppliers;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.suppliers');
    }
    /**
     * Fetch a listing of the resource.
     */
    public function getSuppliers()
    {
        $data = Suppliers::paginate(25);

        return response()->json([
            'data' => $data,
            'message' => 'Suppliers fetched successfully!',
            'success' => true
        ], 200);
    }

    public function select2(Request $request){
        $search = $request->get('q', ''); // Select2 sends 'q' parameter

        $query = Suppliers::query();

        if($search){
            $query->where('name', 'like', "%{$search}%");
        }

        $suppliers = $query->paginate(25);

        $results = $suppliers->map(function($supplier){
            return [
                'id' => $supplier->id,
                'text' => $supplier->name, // ya company_name agar chaho
            ];
        });

        return response()->json([
            'results' => $results,
            'pagination' => [
                'more' => $suppliers->hasMorePages()
            ]
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function storeSuppliers(Request $request)
    {
        $data = new Suppliers();

        $data->name = $request->name;
        $data->email = $request->email;
        $data->phone = $request->phone;
        $data->address = $request->address;
        $data->company_name = $request->company_name;
        $data->opening_balance = $request->opening_balance;

        $data->save();

        return redirect()->back()->with('success', 'Supplier Added!');
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
