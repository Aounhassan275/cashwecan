<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CompanyAccount;
use Illuminate\Http\Request;

class CompanyAccountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.company_account.index');
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
        CompanyAccount::create($request->all());
        toastr()->success('Company Account is Added Successfully');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CompanyAccount  $companyAccount
     * @return \Illuminate\Http\Response
     */
    public function show(CompanyAccount $companyAccount)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CompanyAccount  $companyAccount
     * @return \Illuminate\Http\Response
     */
    public function edit(CompanyAccount $companyAccount)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CompanyAccount  $companyAccount
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CompanyAccount $companyAccount)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CompanyAccount  $companyAccount
     * @return \Illuminate\Http\Response
     */
    public function destroy(CompanyAccount $companyAccount)
    {
        //
    }
    
    public function transfer(Request $request)
    {
        $sender_account = CompanyAccount::find($request->sender_account);
        if($sender_account->balance < $request->amount)
        {
            toastr()->error('Do not have enough Balance!!');
            return redirect()->back();
        }
        $sender_account->update([
            'balance' => $sender_account->balance -= $request->amount,
        ]);
        $receiver_account = CompanyAccount::find($request->receiver_account);
        $receiver_account->update([
            'balance' => $receiver_account->balance += $request->amount,
        ]);
        toastr()->success('Company Account Amount Transferred Successfully');
        return redirect()->back();
    }
}
