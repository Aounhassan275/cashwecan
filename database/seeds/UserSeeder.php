<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admins')->insert([
            [ 'name' => 'Cash Ali',
            'email' => 'cashali@mail.com',
            'type' => '1',
            'password' => Hash::make('Ali008'),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()],
            ['name' => 'Shahid',
            'email' => 'shahid@cash.com',
            'type' => '2',
            'password' => Hash::make('1234'),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()],
            ['name' => 'Rasheed',
            'email' => 'rasheed@cash.com',
            'type' => '2',
            'password' => Hash::make('1234'),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()],
            ['name' => 'Naveed',
            'email' => 'naveed@cash.com',
            'type' => '2',
            'password' => Hash::make('1234'),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()],
            ['name' => 'Taswar',
            'email' => 'taswar@cash.com',
            'type' => '2',
            'password' => Hash::make('1234'),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()],
            ['name' => 'Murtaza',
            'email' => 'murtaza@cash.com',
            'type' => '2',
            'password' => Hash::make('1234'),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()],
        ]);
        DB::table('packages')->insert([
            [ 'name' => 'Smallest',
            'price' => '50',
            'direct_income' => '20',
            'direct_team_income' => '10',
            'upline_income' => '20',
            'down_line_income' => '20',
            'upline_placement_income' => '5',
            'down_line_placement_income' => '5',
            'trade_income' => '5',
            'max_limit' => '5',
            'min_limit' => '5',
            'company_income' => '15'],
            [ 'name' => 'Sliver',
            'price' => '100',
            'direct_income' => '20',
            'direct_team_income' => '10',
            'upline_income' => '20',
            'down_line_income' => '20',
            'upline_placement_income' => '5',
            'down_line_placement_income' => '5',
            'trade_income' => '5',
            'max_limit' => '9',
            'min_limit' => '9',
            'company_income' => '15'],
            [ 'name' => 'Gold',
            'price' => '250',
            'direct_income' => '20',
            'direct_team_income' => '10',
            'upline_income' => '20',
            'down_line_income' => '20',
            'upline_placement_income' => '5',
            'down_line_placement_income' => '5',
            'trade_income' => '5',
            'max_limit' => '12',
            'min_limit' => '12',
            'company_income' => '15'],
            [ 'name' => 'Platinum',
            'price' => '500',
            'direct_income' => '20',
            'direct_team_income' => '10',
            'upline_income' => '20',
            'down_line_income' => '20',
            'upline_placement_income' => '5',
            'down_line_placement_income' => '5',
            'trade_income' => '5',
            'max_limit' => '15',
            'min_limit' => '15',
            'company_income' => '15'],
            [ 'name' => 'Diamond',
            'price' => '1000',
            'direct_income' => '20',
            'direct_team_income' => '10',
            'upline_income' => '20',
            'down_line_income' => '20',
            'upline_placement_income' => '5',
            'down_line_placement_income' => '5',
            'trade_income' => '5',
            'max_limit' => '20',
            'min_limit' => '20',
            'company_income' => '15'],
        ]);
        for($i = 1;$i<= 20;$i++)
        {
            if($i == 1)
            {
                DB::table('users')->insert([
                    [ 'name' => 'company'.$i,
                    'email' => 'company'.$i.'@cashwecan.com',
                    'password' => Hash::make('1234'),
                    'temp_password' =>'1234',
                    'package_id' => '5',
                    'email_verified' => true,
                    'status' => 'active',
                    'a_date' =>  Carbon::today(),
                    'code' => uniqid(),
                    'referral' => $i + 1,
                    'image' => '/profile/311639246735.jpg',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now()],
                ]);
            }elseif($i == 20)
            {
                DB::table('users')->insert([
                    [ 'name' => 'company'.$i,
                    'email' => 'company'.$i.'@cashwecan.com',
                    'password' => Hash::make('1234'),
                    'email_verified' => true,
                    'temp_password' =>'1234',
                    'package_id' => '5',
                    'status' => 'active',
                    'code' => uniqid(),
                    'refer_by' => $i - 1,
                    'referral' => $i + 1,
                    'image' => '/profile/311639246735.jpg',
                    'a_date' =>  Carbon::today(),
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now()],
                ]);
            }
            else{
                DB::table('users')->insert([
                    [ 'name' => 'company'.$i,
                    'email' => 'company'.$i.'@cashwecan.com',
                    'password' => Hash::make('1234'),
                    'temp_password' =>'1234',
                    'email_verified' => true,
                    'package_id' => '5',
                    'status' => 'active',
                    'code' => uniqid(),
                    'refer_by' => $i - 1,
                    'referral' => $i + 1,
                    'image' => '/profile/311639246735.jpg',
                    'a_date' =>  Carbon::today(),
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now()],
                ]);
            } 
            DB::table('package_histories')->insert([
                [ 'user_id' => $i,
                'package_id' => '5',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()],
            ]);
        }
        for($k = 21;$k<= 40;$k++)
        {
            if($k == 40)
            {
                DB::table('users')->insert([
                    [ 'name' => 'fake'.$k,
                    'email' => 'fake'.$k.'@cashwecan.com',
                    'password' => Hash::make('1234'),
                    'temp_password' =>'1234',
                    'package_id' => '1',
                    'status' => 'active',
                    'code' => uniqid(),
                    'refer_by' => $k - 1,
                    'type' => 'fake',
                    'image' => '/profile/311639246735.jpg',
                    'a_date' =>  Carbon::today(),
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now()],
                ]);
            }
            else{
                DB::table('users')->insert([
                    [ 'name' => 'fake'.$k,
                    'email' => 'fake'.$k.'@cashwecan.com',
                    'password' => Hash::make('1234'),
                    'temp_password' =>'1234',
                    'package_id' => '1',
                    'status' => 'active',
                    'code' => uniqid(),
                    'refer_by' => $k - 1,
                    'referral' => $k + 1,
                    'type' => 'fake',
                    'image' => '/profile/311639246735.jpg',
                    'a_date' =>  Carbon::today(),
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now()],
                ]);
            } 
            DB::table('package_histories')->insert([
                [ 'user_id' => $k,
                'package_id' => '1',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()],
            ]);
        }
       
        DB::table('payments')->insert([
            [ 'method' => 'Binance',
            'name' => 'USDT',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()],
            
        ]);
        DB::table('countries')->insert([
            [ 'name' => 'Pakistan'],
            
        ]);
        DB::table('company_accounts')->insert([
            [ 
            'name' => 'Income',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()],
            [ 
            'name' => 'Flush Income',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()],
            [ 
            'name' => 'Team Leader',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()],
            [ 
            'name' => 'Gift',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()],
            [ 
            'name' => 'New Account',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()],
            [ 
            'name' => 'Trade Income',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()],
            
        ]);
        DB::table('settings')->insert([
            [ 
            'name' => 'Fund Transfer Fee',
            'value' => '3',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()],
            [ 
            'name' => 'Site Name',
            'value' => 'Buy E Bazar',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()],
            [ 
            'name' => 'Site Email Slug',
            'value' => 'buyebazar.com',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()],
        ]);


    }
}
