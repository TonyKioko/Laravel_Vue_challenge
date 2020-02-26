<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(Product::all(), 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $product = Product::create([
            'name' => $request->name,
            'description' => $request->description,
            'quanr=tity' => $request->quantity,
            'price' => $request->price,
            'image' => $request->image,
        ]);

        return response()->json([
            'status' => (bool) $product,
            'data' => $product,
            'message' => $product ? 'Product Created!' : 'Error Creating Product',
        ]);
    }

    public function show(Product $product)
    {
        return response()->json($product, 200);

    }

    public function uploadFile(Request $request)
    {
        if ($request->hasFile('image')) {
            $name = time() . "_" . $request->file('image')->getClientOriginalName();
            $request->file('image')->move(public_path('images'), $name);
        }
        return response()->json(asset("images/$name"), 201);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, Product $product)
    {
        $status = $product->update(
            $request->only(['name', 'description', 'quantity', 'price', 'image'])
        );

        return response()->json([
            'status' => $status,
            'message' => $status ? 'Product Updated!' : 'Error Updating Product',
        ]);
    }

    public function updateQuantity(Request $request, Product $product)
    {
        $product->quantity = $product->quantity + $request->get('quantity');
        $status = $product->save();

        return response()->json([
            'status' => $status,
            'message' => $status ? 'quantity Added!' : 'Error Adding Product quantity',
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $status = $product->delete();

        return response()->json([
            'status' => $status,
            'message' => $status ? 'Product Deleted!' : 'Error Deleting Product',
        ]);
    }
}
