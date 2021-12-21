<?php

namespace App\Helpers;

use App\Models\CompanyAccount;
use App\Models\Earning;
use App\Models\Package;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;

class ReferralIncome
{
    public static function  referral($deposit)
    {
        $user = $deposit->user; 
        $refer_by = User::find($user->refer_by);
        $package = Package::find($deposit->package_id);
        if($user->referral == null)
        {
            $fake_account = User::where('type','fake')->first();
            //Replacing Fake User with this user in tree or placement in Tree
            $referral_account = User::where('referral',$fake_account->id)->first();
            $referral_account->update([
                'referral' => $user->id
            ]);
        }
        // ReferralIncome::FakeAccount($fake_account,$user);
        // //Give it Main Refer By and add money in Total Income of Refer By User
        // ReferralIncome::directIncome($package,$refer_by);
        // //Give it to Parents of your Direct Referral Remaining goes to company Account named Flush Income
        // //add money in Total Income
        // ReferralIncome::directTeamIncome($package,$refer_by);
        // //Give it to Upline Tree Member and it in total income and remaining goes to flush Account 
        // ReferralIncome::UplineIncome($package,$user);
        // //Give it to Downline Tree and remaining goes to flush Account 
        // ReferralIncome::DownlineIncome($package,$user);
        // //Give it to Upline Tree members refer by and remaining goes to flush Account 
        // ReferralIncome::UplinePlacementIncome($package,$user);
        // //Give it to Downline Tree members refer by and remaining goes to flush Account 
        // ReferralIncome::DownLinePlacementIncome($package,$user);
        // //If the Refer By is leader then give him this also otherwise  goes to flush Account 
        // ReferralIncome::TradeIncome($package,$refer_by);
        ReferralIncome::CompanyIncome($package);
    } 
    public static  function FakeAccount($fake_account,$user)
    {
        $transfer_amount = $fake_account->cash_wallet;
        if($transfer_amount > $user->package->price)
        {
            $transfer_amount = $user->package->price;
        }
        if($transfer_amount > 0)
        {
            $user->update([
                'total_income' => $user->total_income + $transfer_amount,
            ]);
            Earning::create([
                'price' => $transfer_amount,
                'user_id' => $user->id,
                'type' => 'trade_income'
            ]);
        }
        $user->update([
            'referral' => $fake_account->referral,
        ]);
        info("Deleting Fake Account : $fake_account->name"); 
        $fake_account->delete();
        $account = User::where('type','fake')->where('referral',null)->first();
        $k = $account->id + 1;
        $new_fake_account = User::create([
            'name' => 'fake'.$k,
            'email' => 'fake'.$k.'@cashwecan.com',
            'password' => Hash::make('1234'),
            'package_id' => '1',
            'status' => 'active',
            'code' => uniqid(),
            'refer_by' => $account->id,
            'type' => 'fake',
            'a_date' =>  Carbon::today(),
        ]);
        $account->update([
            'referral' => $new_fake_account->id
        ]);
        info("Create New Fake Account : $new_fake_account->name"); 
    } 
    public static  function directIncome($package,$user)
    {
        $direct_income = $package->price / 100 * $package->direct_income;
        info("Direct Income Amount To $user->name : $direct_income");
        Earning::create([
            'price' => $direct_income,
            'user_id' => $user->id,
            'type' => 'direct_income'
        ]);
        $user->update([
            'total_income' => $user->total_income + $direct_income
        ]);
    } 
    public static  function directTeamIncome($package,$user)
    {
        $direct_team_income = $package->price / 100 * $package->direct_team_income;
        info("Direct Team Income Amount : $direct_team_income"); 
        $per_person_amount = $direct_team_income/20;
        info("Direct Team Income Amount Per Person : $per_person_amount"); 
        $direct_teams = $user->directTeamParents();
        foreach($direct_teams as $direct_team)
        {
            Earning::create([
                'price' => $per_person_amount,
                'user_id' => $direct_team->id,
                'type' => 'direct_team_income'
            ]);
            $direct_team->update([
                'total_income' => $direct_team->total_income + $per_person_amount
            ]);
            info("Direct Team Income Amount Added to $direct_team->name : $per_person_amount"); 
            $direct_team_income = $direct_team_income - $per_person_amount;
        }
        if($direct_team_income > 0)
        {
            $flush_account = CompanyAccount::where('name','Flush Income')->first();
            $flush_account->update([
                'balance' => $flush_account->balance + $direct_team_income,
            ]);
            info("Direct Team Income Remaining Amount $direct_team_income Added to flush company Account"); 
        }
    } 
    public static  function UplineIncome($package,$user)
    {
        $upline_income = $package->price / 100 * $package->upline_income;
        info("Upline Income Amount : $upline_income"); 
        $per_person_amount = $upline_income/20;
        info("Upline Income Amount Per Person : $per_person_amount"); 
        $uplines = $user->uplineUserIncome();
        foreach($uplines as $upline)
        {
            $response = $upline->CompareDownlineuser($upline,$user);
            if($response)
            {
                Earning::create([
                    'price' => $per_person_amount,
                    'user_id' => $upline->id,
                    'type' => 'upline_income'
                ]);
                $upline->update([
                    'total_income' => $upline->total_income + $per_person_amount
                ]);
                info("Upline Income Amount Added to $upline->name : $per_person_amount"); 
                $upline_income = $upline_income - $per_person_amount;
            }else{
                $flush_account = CompanyAccount::where('name','Flush Income')->first();
                $flush_account->update([
                    'balance' => $flush_account->balance + $per_person_amount,
                ]);
                info("Upline Income For $upline->name Amount $per_person_amount Added to flush company Account"); 
            }
          
        }
    } 
    public static  function DownlineIncome($package,$user)
    {
        $down_line_income = $package->price / 100 * $package->down_line_income;
        info("Downline Income Amount : $down_line_income"); 
        $per_person_amount = $down_line_income/20;
        info("Downline Income Amount Per Person : $per_person_amount"); 
        $downlines = $user->downlineUsersForDowlineIncome();
        foreach($downlines as $downline)
        {
            // $response = $downline->ComparUplineuser($downline,$user);
            $response =true;
            if($response)
            {
                Earning::create([
                    'price' => $per_person_amount,
                    'user_id' => $downline->id,
                    'type' => 'down_line_income'
                ]);
                $downline->update([
                    'total_income' => $downline->total_income + $per_person_amount
                ]);
                info("Downline Income Amount Added to $downline->name : $per_person_amount"); 
            }else{
                $flush_account = CompanyAccount::where('name','Flush Income')->first();
                $flush_account->update([
                    'balance' => $flush_account->balance + $per_person_amount,
                ]);
                info("Downline Income For $downline->name Added to flush company Account :  $per_person_amount"); 
            }
            
        }
    } 
    public static  function UplinePlacementIncome($package,$user)
    {
        $upline_placement_income = $package->price / 100 * $package->upline_placement_income;
        info("Upline Placement Income Amount : $upline_placement_income"); 
        $per_person_amount = $upline_placement_income/20;
        info("Upline Placement Income Amount Per Person : $per_person_amount"); 
        $uplines = $user->uplineUserIncome();
        foreach($uplines as $upline)
        {
            $response = $upline->CompareDownlineuser($upline,$user);
            if($response)
            {
                $refer_by = User::find($upline->refer_by);
                if($refer_by)
                {
                    Earning::create([
                        'price' => $per_person_amount,
                        'user_id' => $refer_by->id,
                        'type' => 'upline_placement_income'
                    ]);
                    $refer_by->update([
                        'total_income' => $refer_by->total_income + $per_person_amount
                    ]);
                    info("Upline Placement Income Amount Added to $refer_by->name : $per_person_amount"); 
                }else{
                    $flush_account = CompanyAccount::where('name','Flush Income')->first();
                    $flush_account->update([
                        'balance' => $flush_account->balance + $per_person_amount,
                    ]);
                    info("Upline Placement Income For $upline->name Amount $per_person_amount Added to flush company Account");     
                }
            }
            else{
                $flush_account = CompanyAccount::where('name','Flush Income')->first();
                $flush_account->update([
                    'balance' => $flush_account->balance + $per_person_amount,
                ]);
                info("Upline Placement Income For $upline->name Amount $per_person_amount Added to flush company Account");          
            }
        }
    } 
    public static  function DownLinePlacementIncome($package,$user)
    {
        $down_line_placement_income = $package->price / 100 * $package->down_line_placement_income;
        info("Downline Placement Income Amount : $down_line_placement_income"); 
        $per_person_amount = $down_line_placement_income/20;
        info("Downline Placement Income Amount Per Person : $per_person_amount"); 
        $downlines = $user->downlineUsersForDowlineIncome();
        foreach($downlines as $downline)
        {
            // $response = $downline->ComparUplineuser($downline,$user);
            $response =true;
            if($response)
            {
                $refer_by = User::find($downline->refer_by);
                if($refer_by)
                {
                    Earning::create([
                        'price' => $per_person_amount,
                        'user_id' => $refer_by->id,
                        'type' => 'down_line_placement_income'
                    ]);
                    $refer_by->update([
                        'total_income' => $refer_by->total_income + $per_person_amount
                    ]);
                    info("Downline Placement Income Amount Added to $refer_by->name : $per_person_amount"); 
                }else{
                    $flush_account = CompanyAccount::where('name','Flush Income')->first();
                    $flush_account->update([
                        'balance' => $flush_account->balance + $per_person_amount,
                    ]);
                    info("Downline Placement Income For $downline->name Amount $per_person_amount Added to flush company Account"); 
                }
            }else{
                $flush_account = CompanyAccount::where('name','Flush Income')->first();
                $flush_account->update([
                    'balance' => $flush_account->balance + $per_person_amount,
                ]);
                info("Downline Placement Income For $downline->name Amount $per_person_amount Added to flush company Account"); 
          
            }
            
        }
    } 
    public static function TradeIncome($package,$user)
    {
        $trade_income = $package->price / 100 * $package->trade_income;
        info("Trade Income Amount : $trade_income");
        if($user->type == 'leader')
        {
            Earning::create([
                'price' => $trade_income,
                'user_id' => $user->id,
                'type' => 'trade_income'
            ]);
            $user->update([
                'total_income' => $user->total_income + $trade_income
            ]);
            info("Trade Income Amount Added to $user->name : $trade_income"); 
        }else{
            $flush_account = CompanyAccount::where('name','Flush Income')->first();
            $flush_account->update([
                'balance' => $flush_account->balance + $trade_income,
            ]);
            info("Trade Income Remaining Amount $trade_income Added to flush company Account"); 
        }
    } 
    public static function CompanyIncome($package)
    {
        $company_income = $package->price / 100 * $package->company_income;
        info("Company Income Amount : $company_income");
        $company_account= CompanyAccount::where('name','Income')->first();
        
        // $company_account->update([
        //     'balance' => $company_account->balance + $company_income,
        // ]);
    } 
    
}