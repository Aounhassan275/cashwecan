<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\CompanyAccount;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
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
        $user_deduction = $order->price/100 * 3;
        $transfer_amount = $order->price/100 * 97;
        $sale_reward_for_users = $user_deduction/100 * 20;
        $owner = User::find($order->owner_id);
        $owner->update([
            'cash_wallet' => $owner->cash_wallet + $transfer_amount,
            'sale_reward' => $owner->sale_reward += $sale_reward_for_users
        ]);
        $user = User::find($order->user_id);
        $user->update([
            'sale_reward' => $user->sale_reward += $sale_reward_for_users
        ]);
        $sale_reward_for_trade = $user_deduction/100*50;
        $trade_income= CompanyAccount::where('name','Trade Income')->first();
        $trade_income->update([
            'balance' => $trade_income->balance += $sale_reward_for_trade
        ]);
        $sale_reward_for_gift = $user_deduction/100*10;
        $gift= CompanyAccount::where('name','Gift')->first();
        $gift->update([
            'balance' => $gift->balance += $sale_reward_for_gift
        ]);
        toastr()->warning('Order Updated Successfully!');
        return redirect(route('user.order.index'));
    }
    public function orderRejected($id)
    {
        $order = Order::find($id);
        $order->update([
            'status' => 'Rejected'
        ]);
        $user_deduction = $order->price/100 * 3;
        $transfer_amount = $order->price/100 * 97;
        $sale_reward_for_users = $user_deduction/100 * 20;
        $owner = User::find($order->owner_id);
        $owner->update([
            'cash_wallet' => $owner->cash_wallet + $transfer_amount,
            'sale_reward' => $owner->sale_reward += $sale_reward_for_users
        ]);
        $user = User::find($order->user_id);
        $user->update([
            'sale_reward' => $user->sale_reward += $sale_reward_for_users
        ]);
        $sale_reward_for_trade = $user_deduction/100*50;
        $trade_income= CompanyAccount::where('name','Trade Income')->first();
        $trade_income->update([
            'balance' => $trade_income->balance += $sale_reward_for_trade
        ]);
        $sale_reward_for_gift = $user_deduction/100*10;
        $gift= CompanyAccount::where('name','Gift')->first();
        $gift->update([
            'balance' => $gift->balance += $sale_reward_for_gift
        ]);
        toastr()->warning('Order Updated Successfully!');
        return redirect(route('user.order.index'));
    }
}
