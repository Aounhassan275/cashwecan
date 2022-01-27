<?php

namespace App\Http\Controllers\User;

use App\Helpers\ReferralIncome;
use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Deposit;
use App\Models\Earning;
use App\Models\Package;
use App\Models\Payment;
use App\Models\ReferralLog;
use App\Models\CompanyAccount;
use App\Models\PackageHistory;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DepositController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('user.deposit.index');
    }
    public function deposit($payment, $package)
    {
        $package= Package::find($package);
        $payment= Payment::find($payment);

        return view('user.deposit.index')
            ->with('payment',$payment)
            ->with('package',$package);
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
   
        $package= Package::find($request->package_id);
        $validator = Validator::make($request->all(),[
            't_id' => 'required|unique:deposits'
        ]);

        if($validator->fails()){
            toastr()->error('Transaction Id already exists');
            return redirect()->back();
        }

        Deposit::create([
            'user_id' => Auth::user()->id
        ]+$request->all());

        $user = Auth::user();
        $user->update([
            'status' => 'onHold'
        ]);

        toastr()->success('Your Deposit Request Has Been successfully Submitted.Please Wait 24 Hour For Activation.');
        
        return redirect(route('user.dashboard.index'));
    }
    public function directDeposit($id)
    {
        $user= User::find(Auth::user()->id);
        $package= Package::find($id);
        if($user->cash_wallet >= $package->price)
        {
            $user->update([
                'status' => 'active',
                'a_date' => Carbon::today(),
                'package_id' => $package->id,
                'cash_wallet' => $user->cash_wallet -= $package->price,    
            ]);
            if($package->price > 10)
            {
                ReferralIncome::referral($user);
            }else
            {
                $refer_by = User::find($user->refer_by);
                ReferralIncome::directIncome($package->price,$package,$refer_by,$user);
            }
            toastr()->success('Your Package Active Successfully.');
            return redirect(route('user.dashboard.index'));
        }else{
            toastr()->warning('Your Cash Wallet have not enough balance to purchase Package.');
            return redirect()->back();
        }
        // $deposit = Deposit::create([
        //     'user_id' => Auth::user()->id,
        //     't_id' => uniqid(),
        //     'payment' => 'Own Balance',
        //     'package_id' => $package->id,
        //     'amount' => $package->price,
        //     'status' => 'old'
        // ]);
      
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Deposit  $deposit
     * @return \Illuminate\Http\Response
     */
    public function show(Deposit $deposit)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Deposit  $deposit
     * @return \Illuminate\Http\Response
     */
    public function edit(Deposit $deposit)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Deposit  $deposit
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Deposit $deposit)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Deposit  $deposit
     * @return \Illuminate\Http\Response
     */
    public function destroy(Deposit $deposit)
    {
        //
    }
}
