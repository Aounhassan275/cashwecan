<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('user.order.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->price > Auth::user()->cash_wallet)
        {            
            toastr()->error('You dont have enough amount in Cash Wallet to purchase this Product!');
            return redirect()->back();
        }
        Auth::user()->update([
            'cash_wallet' => Auth::user()->cash_wallet -= $request->price
        ]);
        Order::create($request->all());
        $product = Product::find($request->product_id);
        $product->update([
            'stock' => $product->stock - 1
        ]);
        toastr()->warning('Order Created Successfully!');
        return redirect(route('user.order.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
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
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        
        $order = Order::find($id);
        $order->update($request->all());
        toastr()->success('Order Informations Updated successfully');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }
    public function orderonHold($id)
    {
        $order = Order::find($id);
        $order->update([
            'status' => 'onHold'
        ]);
        toastr()->warning('Order Updated Successfully!');
        return redirect(route('user.order.index'));
    }
    public function orderCompleted($id)
    {
        $order = Order::find($id);
        $order->update([
            'status' => 'Completed'
        ]);
        toastr()->warning('Order Updated Successfully!');
        return redirect(route('user.order.index'));
    }
}
