<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Package;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PackageController extends Controller
{
    public function payment($id)
    {
      $package = Package::find($id);
      return view('user.package.payment')->with('package',$package);
    }
    public function index()
    {
      return view('user.package.index');
    }
    public function history()
    {
      return view('user.package.history');
    }
}
