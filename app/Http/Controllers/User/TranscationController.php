<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
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
        $users = User::where('id','!=',Auth::user()->id)->orderBy('name')->get();
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
        $validator = Validator::make($request->all(),[
            'receiver_id' => 'required',
            'sender_id' => 'required',
            'amount' => 'required',
        ]);
        if($validator->fails()){
            toastr()->error('Must Fill All Fields');
            return redirect()->back();
        }
        if($user->cash_wallet < $request->amount)
        {
            toastr()->error('Insufficient Balance.');
            return redirect()->back();
        }
        $user->update([
            'cash_wallet' => $user->cash_wallet - $request->amount
        ]);
        $receiver = User::find($request->receiver_id);
        $receiver->update([
            'cash_wallet' => $receiver->cash_wallet += $request->amount
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
}
