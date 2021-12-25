<?php

namespace App\Http\Controllers\User;

use App\Helpers\ReferralIncome;
use App\Http\Controllers\Controller;
use App\Models\CompanyAccount;
use App\Models\Earning;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('user.profile.index');
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
    //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $user = User::find($request->id);
        if($request->password)
        {
            $user->update([
                'password' => $request->password
            ]);
        }
        $user->update($request->except('password'));
        toastr()->success('Your Informations Updated successfully');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
    public function refer()
    {
        $user = Auth::user();
        if($user->checkStatus() == false)   
        {
          toastr()->success('Your Package is Expire');
           return redirect(route('user.dashboard.index'));
        }
        return view('user.refer.index')->with('user',$user);
    }
    public function transferFunds(Request $request)
    {
        $user = Auth::user();
        $amount = $request->cash_wallet + $request->community_pool;
        if($amount > $user->total_income)
        {
            return response()->json([
                'status' => false,
                'message' => 'Amount is greater than temp income'
            ]);
           
        }
        $user->update([
            'cash_wallet' => $user->cash_wallet + $request->cash_wallet,
            'community_pool' =>  $user->community_pool +$request->community_pool,
            'total_income' => $user->total_income - $amount
        ]);
        ReferralIncome::CommunityPoolIncome($request->community_pool);
        toastr()->success('Amount Transferred Successfully');
        return response()->json([
            'status' => true,
            'message' => 'Amount Transferred Successfully!!'
        ]);
    }
    
}