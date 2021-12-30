<?php

namespace App\Http\Controllers\CronJob;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Helpers\ReferralIncome;
use App\Helpers\UserHepler;
use App\Models\CompanyAccount;
use App\Models\Package;
use App\Models\User;
use Carbon\Carbon;

class CronjobController extends Controller
{
    public function payment_distrubtion() {
		info("Payment Distrubtion CRONJOB CALLED AT " . date("d-M-Y h:i a"));
		$payment_distrubtion_days = 3;
		$payment_distrubtion_days = date('Y-m-d', strtotime("-$payment_distrubtion_days days"));
		info("Payment Distrubtion CRONJOB:   $payment_distrubtion_days");
        $users = User::where('associated_with',null)
                ->whereDate('last_login',$payment_distrubtion_days)
                ->where('total_income','>',10)
                ->where('refer_by','!=',null)
                ->where('type','!=','fake')
                ->get();
		if ($users) {
            $total_users = $users->count();
            info("Payment Distrubtion CRONJOB Total Users : $total_users");
            foreach($users as $user)
            {
                info("Payment Distrubtion CRONJOB User : $user->name");
                $total_amount = $user->total_income;
                info("Payment Distrubtion CRONJOB User Total Income : $total_amount");
                $amount = $total_amount/2;
                info("Payment Distrubtion CRONJOB User Income to Divide: $amount");
                $amount_to_divide = $amount/2;
                info("Payment Distrubtion CRONJOB User Income to Divide into Community Pool and Cash wallet: $amount_to_divide");
                if($user->package->price >= 1000)
                {
                    $amount_for_packages = $amount_to_divide + $user->community_pool;
                    $total_packages = $amount_for_packages/50;
                    $total_packages = (int)$total_packages;
                    $package_amount = $total_packages * 50;
                    $community_amount = $amount_for_packages - $package_amount;
                    ReferralIncome::CommunityPoolIncome($user,$amount_to_divide);
                    if($total_packages > 0)
                    {
                        for($i = 0;$i < $total_packages;$i++)     
                        {
                            UserHepler::CreateUser($user);
                        }     
                    }
                    if($community_amount > 0)
                    {
                        $user->update([
                            'community_pool' =>  $community_amount,
                        ]);
                    }else{
                        $user->update([
                            'community_pool' =>  0,
                        ]);
                    }
                    
                    $user->update([
                        'cash_wallet' => $user->cash_wallet + $amount_to_divide,
                        'total_income' => $user->total_income - $total_amount
                    ]);
                }else{
                    $user->update([
                        'cash_wallet' => $user->cash_wallet + $amount_to_divide,
                        'investment_amount' =>  $user->investment_amount +$amount_to_divide,
                        'total_income' => $user->total_income - $total_amount
                    ]);
                    ReferralIncome::CommunityPoolIncome($user,$amount_to_divide);
                }
                $flush_account = CompanyAccount::where('name','Flush Income')->first();
                $flush_account->update([
                    'balance' => $flush_account->balance + $amount,
                ]);
                info("Payment Distrubtion CRONJOB For User $user->name : Amount $amount Added to flush company Account");  
            }

		} else {
			info("Payment Distrubtion CRONJOB: Users not found. ");
		}
		info("Payment Distrubtion CRONJOB END AT " . date("d-M-Y h:i a"));
	}
    public function payment_distrubtion_for_assoiated_account() {
		info("Payment Distrubtion For Assoiated Account CRONJOB CALLED AT " . date("d-M-Y h:i a"));
        $users = User::where('associated_with','!=',null)
                ->where('cash_wallet','>',0)
                ->get();
		if ($users) {
            $total_users = $users->count();
            info("Payment Distrubtion For Assoiated Account  CRONJOB Total Users : $total_users");
            foreach($users as $user)
            {
                info("Payment Distrubtion For Assoiated Account   CRONJOB User : $user->name");
                $total_amount = $user->cash_wallet;
                info("Payment Distrubtion For Assoiated Account   CRONJOB User Total Income : $total_amount");
                $amount = $total_amount/2;
                $owner = User::find($user->associated_with);
                info("Payment Distrubtion For Assoiated Account CRONJOB User Total Income added to : $owner->name");
                $owner->update([
                    'total_income' => $user->total_income + $amount
                ]);
                $user->update([
                    'cash_wallet' => $user->cash_wallet - $total_amount
                ]);
                $flush_account = CompanyAccount::where('name','Flush Income')->first();
                $flush_account->update([
                    'balance' => $flush_account->balance + $amount,
                ]);
                info("Payment Distrubtion For Assoiated Account   CRONJOB For User $user->name : Amount $amount Added to flush company Account");  
            }

		} else {
			info("Payment Distrubtion For Assoiated Account   CRONJOB: Users not found. ");
		}
		info("Payment Distrubtion For Assoiated Account   CRONJOB END AT " . date("d-M-Y h:i a"));
	}
    public function payment_distrubtionforassociatedUsers() {
		info("Payment Distrubtion CRONJOB CALLED AT " . date("d-M-Y h:i a"));
        $users = User::where('associated_with','!=',null)
                ->where('total_income','>',10)
                ->where('refer_by','!=',null)
                ->where('type','!=','fake')
                ->get();
		if ($users) {
            $total_users = $users->count();
            info("Payment Distrubtion CRONJOB Total Users : $total_users");
            foreach($users as $user)
            {
                info("Payment Distrubtion CRONJOB User : $user->name");
                $total_amount = $user->total_income;
                info("Payment Distrubtion CRONJOB User Total Income : $total_amount");
                $amount = $total_amount/2;
                info("Payment Distrubtion CRONJOB User Income to Divide: $amount");
                $amount_to_divide = $amount/2;
                info("Payment Distrubtion CRONJOB User Income to Divide into Community Pool and Cash wallet: $amount_to_divide");
                if($user->package->price >= 1000)
                {
                    $amount_for_packages = $amount_to_divide + $user->community_pool;
                    $total_packages = $amount_for_packages/50;
                    $total_packages = (int)$total_packages;
                    $package_amount = $total_packages * 50;
                    $community_amount = $amount_for_packages - $package_amount;
                    ReferralIncome::CommunityPoolIncome($user,$amount_to_divide);
                    if($total_packages > 0)
                    {
                        for($i = 0;$i < $total_packages;$i++)     
                        {
                            UserHepler::CreateUser($user);
                        }     
                    }
                    if($community_amount > 0)
                    {
                        $user->update([
                            'community_pool' =>  $community_amount,
                        ]);
                    }else{
                        $user->update([
                            'community_pool' =>  0,
                        ]);
                    }
                    
                    $user->update([
                        'cash_wallet' => $user->cash_wallet + $amount_to_divide,
                        'total_income' => $user->total_income - $total_amount
                    ]);
                }else{
                    $user->update([
                        'cash_wallet' => $user->cash_wallet + $amount_to_divide,
                        'investment_amount' =>  $user->investment_amount +$amount_to_divide,
                        'total_income' => $user->total_income - $total_amount
                    ]);
                    ReferralIncome::CommunityPoolIncome($user,$amount_to_divide);
                }
                $flush_account = CompanyAccount::where('name','Flush Income')->first();
                $flush_account->update([
                    'balance' => $flush_account->balance + $amount,
                ]);
                info("Payment Distrubtion CRONJOB For User $user->name : Amount $amount Added to flush company Account");  
            }

		} else {
			info("Payment Distrubtion CRONJOB: Users not found. ");
		}
		info("Payment Distrubtion CRONJOB END AT " . date("d-M-Y h:i a"));
	}
    public function upgradePackage() {
		info("Package Upgrade CRONJOB CALLED AT " . date("d-M-Y h:i a"));
        $users = User::where('investment_amount','>=',50)
                    ->where('type','!=','fake')
                    ->get();
		if ($users) {
            $total_users = $users->count();
            info("Package Upgrade  CRONJOB Total Users : $total_users");
            foreach($users as $user)
            {
                info("Package Upgrade CRONJOB User : $user->name");
                $total_amount = $user->investment_amount + $user->package->price;
                $package = Package::where('price','>',$user->package->price)->first();
                if($package)
                {
                    if($total_amount >= $package->price)
                    {
                        $remaining = $total_amount - $package->price;
                        $user->update([
                            'a_date' => Carbon::today(),
                            'package_id' => $package->id,
                            'investment_amount' => $remaining,
                        ]);
                    }
                    
                    info("Package Upgrade CRONJOB User : $user->name  is upgraded to $package->name");
                }
            }
		} else {
			info("Package Upgrade CRONJOB: Users not found. ");
		}
		info("Package Upgrade CRONJOB END AT " . date("d-M-Y h:i a"));
	}
}
