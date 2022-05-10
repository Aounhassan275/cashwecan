<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Withdraw;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WithdrawController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('user.withdraw.index');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.withdraw.create');
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
        if($user->WithdrawLimits() == false){
            toastr()->warning('Must Need 2 Referral');
            return redirect()->back();
        } 
        if($request->payment < 25)
        {
            toastr()->error('Balance must be 25 in a cash wallet to get Withdraw');
            return redirect()->back();
        }
        if($request->payment > $user->cash_wallet){
              toastr()->error('Not enough balance');
              return redirect()->back();
        }
        Withdraw::create([
            'user_id' => $user->id
        ]+$request->all());
        
        $user->update([
            'cash_wallet' => $user->cash_wallet - $request->payment,    
        ]);
        toastr()->success('Withdraw Request is Submit Successfully');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Withdraw  $withdraw
     * @return \Illuminate\Http\Response
     */
    public function show(Withdraw $withdraw)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Withdraw  $withdraw
     * @return \Illuminate\Http\Response
     */
    public function edit(Withdraw $withdraw)
    {
        return view('user.withdraw.edit')->with('withdraw',$withdraw);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Withdraw  $withdraw
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Withdraw $withdraw)
    {
        $withdraw->update($request->all());
        toastr()->success('Withdraw Informations Updated successfully');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Withdraw  $withdraw
     * @return \Illuminate\Http\Response
     */
    public function destroy(Withdraw $withdraw)
    {
        $withdraw->delete();
        toastr()->success('Your Withdraw Request is Deleted Successfully');
        return redirect()->back();
    }
}
