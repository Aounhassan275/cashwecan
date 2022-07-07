<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\CompanyAccount;
use App\Models\Setting;
use App\Models\Transcation;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class TranscationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $transcations = Transcation::where('receiver_id',Auth::user()->id)
        ->orWhere('sender_id',Auth::user()->id)->get();
        return view('user.transcation.index')->with('transcations',$transcations);
    }
    public function balance_transfer()
    {
        if(Auth::user()->checkStatus() == false)   
        {
          toastr()->success('Your Package is Expire');
           return redirect(route('user.dashboard.index'));
        }
        $users = User::where('id','!=',Auth::user()->id)->where('type','!=','fake')->orderBy('name')->get();
        return view('user.balance_transfer.index')->with('users',$users);
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
        $user = Auth::user();
        $fund_fee = $request->amount/100 * Setting::fundFee();
        $total_amount = $request->amount + $fund_fee;
        if($user->temp_password != $request->new_password)
        {
            toastr()->error('Password Not Matched!!');
            return redirect()->back();
        }
        if($user->FundTransferLimits() == false){
            toastr()->error('Must Need 2 Referral');
            return redirect()->back();
      }
        $validator = Validator::make($request->all(),[
            'receiver_id' => 'required',
            'sender_id' => 'required',
            'amount' => 'required',
        ]);
        if($validator->fails()){
            toastr()->error('Must Fill All Fields');
            return redirect()->back();
        }
        if($user->cash_wallet < $total_amount)
        {
            toastr()->error('Insufficient Balance.');
            return redirect()->back();
        }
        $sale_reward_for_users = $fund_fee/100*20;
        $user->update([
            'cash_wallet' => $user->cash_wallet - $total_amount,
            'sale_reward' => $user->sale_reward += $sale_reward_for_users
        ]);
        $receiver = User::find($request->receiver_id);
        $receiver->update([
            'cash_wallet' => $receiver->cash_wallet += $request->amount,
            'sale_reward' => $receiver->sale_reward += $sale_reward_for_users
        ]);
        $sale_reward_for_trade = $fund_fee/100*50;
        $trade_income= CompanyAccount::where('name','Trade Income')->first();
        $trade_income->update([
            'balance' => $trade_income->balance += $sale_reward_for_trade
        ]);
        $sale_reward_for_gift = $fund_fee/100*10;
        $gift= CompanyAccount::where('name','Gift')->first();
        $gift->update([
            'balance' => $gift->balance += $sale_reward_for_gift
        ]);
        Transcation::create([
            'detail' => 'Amount Transfer from '.$user->name.' to '.$receiver->name.' account.'
        ]+$request->all());
        toastr()->success('Balance Transfer To User Account Successfully!');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Transcation  $transcation
     * @return \Illuminate\Http\Response
     */
    public function show(Transcation $transcation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Transcation  $transcation
     * @return \Illuminate\Http\Response
     */
    public function edit(Transcation $transcation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Transcation  $transcation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Transcation $transcation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Transcation  $transcation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Transcation $transcation)
    {
        //
    }
    public function getfeeAmount(Request $request)
    {
        $fee = Setting::fundFee();
        $total_fee = $request->amount/100 * $fee;
        $amount = $request->amount + $total_fee;
        return response()->json(['amount' => $amount]);
    }
}
