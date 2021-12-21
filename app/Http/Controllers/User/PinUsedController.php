<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Pin;
use App\Models\PinUsed;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PinUsedController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $pin = Pin::where('name',$request->name)->first();
        $pins= PinUsed::where('pin_id',$pin->id)->first();
        if($pins)
        {
            toastr()->error('Pin Already Used.');
            return redirect()->back();
        }
        if(!$pin)
        {
            toastr()->error('Pin Not Found.');
            return redirect()->back();
        }
        $user->update([
            'balance' => $user->balance + $pin->amount
        ]);
        PinUsed::create([
            'user_id' => $user->id,
            'pin_id' => $pin->id
        ]);
        toastr()->success('Balance Transfer To Your Account Successfully!');
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PinUsed  $pinUsed
     * @return \Illuminate\Http\Response
     */
    public function show(PinUsed $pinUsed)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PinUsed  $pinUsed
     * @return \Illuminate\Http\Response
     */
    public function edit(PinUsed $pinUsed)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PinUsed  $pinUsed
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PinUsed $pinUsed)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PinUsed  $pinUsed
     * @return \Illuminate\Http\Response
     */
    public function destroy(PinUsed $pinUsed)
    {
        //
    }
}
