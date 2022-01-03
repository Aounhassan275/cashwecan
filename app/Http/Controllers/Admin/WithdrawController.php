<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Withdraw;
use App\Models\CompanyAccount;
use App\Models\User;
use Illuminate\Http\Request;

class WithdrawController extends Controller
{
    
    public function delete($id){
        $withdraw =  Withdraw::find($id);
        $user = User::find($withdraw->user_id);
        $user->update([
            'cash_wallet' => $user->cash_wallet + $withdraw->payment 
        ]);
        $withdraw->update([
            'status' => 'Rejected'
        ]);
        toastr()->success('Withdraw Request is Rejected Successfully');
        return redirect()->back();
    }
    
    public function hold($id)
    {
        $withdraw = Withdraw::find($id);

        // dd($deposit);
        $withdraw->update([
            'status' => 'On Hold',
        ]);     
        toastr()->success('Withdraw is on On Hold Now');

        return redirect()->back();
    }
     public function completed($id)
    {
        $withdraw = Withdraw::find($id);

        // dd($deposit);
        $withdraw->update([
            'status' => 'Completed',
        ]);
        $amount = $withdraw->payment/100 * 90;
        $name = $withdraw->user->name;
        info("Withdraw Completed : $amount Transferred To User $name");   
        $company_account= CompanyAccount::find(1);
        $company_account->update([
          'balance' => $company_account->balance -= $amount,
        ]);
        toastr()->success('Withdraw is Completed Now');
        return redirect()->back();
    }
}
