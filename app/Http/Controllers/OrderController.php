<?php

namespace App\Http\Controllers;

use App\Order;
use Illuminate\Http\Request;
use App\OrderDetail;
use Auth;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::with(['order_details'])->get();

        if (is_null($orders) || empty($orders) || sizeof($orders) < 1){
            return response()->json([
                "message"=> "No Available Orders available"
            ], 201);
        }

        return \response()->json([
            "message"=> "All available Types",
            "data"=> $orders
        ], 200);
        // return response()->json(Order::with(['order_details'])->get(),200);

        
    }

    public function store(Request $request)
    {
        $order = Order::create([
        ]);
        $order->update([
            'order_number' => $order->id
        ]);

        $orderDetail = OrderDetail::create([
            'product_id' => $request->product_id,
            'quantity' => $request->quantity,
            'order_id' => $order->id
        ]);

        return response()->json([
            'status' => (bool) $orderDetail,
            'data'   => $orderDetail,
            'message' => $orderDetail ? 'Order Created!' : 'Error Creating Order'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $order = Order::where('id',$id)->with('order_details')->first();

        return response()->json($order,200);
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $order = Order::where('id',$id)->first();
        $order->delete();

        return response()->json([
            'message' => 'OrderDetails Deleted'
        ]);
    }
}
