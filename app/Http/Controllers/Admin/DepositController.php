<?php

namespace App\Http\Controllers\Admin;
use App\Helpers\Message;
use App\Helpers\ReferralIncome;
use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Deposit;
use App\Models\Earning;
use App\Models\Package;
use App\Models\ReferralLog;
use App\Models\User;
use App\Models\CompanyAccount;
use App\Models\PackageHistory;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DepositController extends Controller
{
    public function active($id)
    {
        $deposit = Deposit::find($id);
        $user = $deposit->user; 
        $user->update([
            'status' => 'active',
            'a_date' => Carbon::today(),
            'package_id' => $deposit->package_id,
        ]);
       
        ReferralIncome::referral($deposit);
        $deposit->update([
            'status' => 'old'
        ]);
        PackageHistory::create([
            'package_id ' => $deposit->package_id,
            'user_id ' => $user->id,
            'deposit_id ' => $deposit->id
        ]);
        toastr()->success('User is Active Successfully');
        return redirect()->back();
    }
    public function delete($id){
        $deposit = Deposit::find($id);
        $user = $deposit->user; 
          $user->update([
            'status' => 'pending'
        ]);
        $deposit->delete();
        toastr()->success('Deposit Request is Deleted Successfully');
        return redirect()->back();
    }
}
