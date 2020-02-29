<?php

namespace App\Http\Controllers;

use App\Supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    public function index()
    {
        return response()->json(Supplier::all(), 200);
    }

    
    public function store(Request $request)
    {
        // dd($request);
        $supplier = Supplier::create([
            'name' => $request->supplier,
        ]);

        return response()->json([
            'data' => $supplier,
            'message' => $supplier ? 'Supplier Created!' : 'Error Creating Supplier',
        ]);
    }

   
    public function show($id)
    {
        $supplier = Supplier::where('id',$id)->first();
        return response()->json($supplier, 200);
        
    }

    
    public function update(Request $request, Supplier $supplier)
    {
        //
    }

   
    public function destroy($id)
    {
        $supplier = Supplier::where('id',$id)->first();

        $supplier->delete();
        return response()->json([
            'message' => 'Supplier deleted successfully',
        ]);
    }
}
