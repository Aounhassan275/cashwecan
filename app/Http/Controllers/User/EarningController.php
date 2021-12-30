<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EarningController extends Controller
{
    private $months;
    private $timeFormat;
    private $DateFormat;

    public function __construct() {
        $this->months = [
                "January", "February", "March",
                "April", "May", "June", "July",
                "August", "September", "October",
                "November", "December"
        ];

        $this->timeFormat = 'Y-m-d H:i:s';
        $this->DateFormat = 'Y-m-d';
    }
    public function trade_income(Request $request)
    {
        $data['default_to']   = date($this->timeFormat);
        $data['default_from'] = date($this->timeFormat, strtotime("-30 days", strtotime($data['default_to'])));

        $to     = $request->input('to');
        $from   = $request->input('from');

        if(empty($to))
        {
            $to = $data['default_to'];
        }

        if(empty($from))
        {
            $from = $data['default_from'];
        }

        //-01 tells that it is date in yyyy-mm format not in timestamp format
        $fromDate       = new Carbon($from);
        $toDate         = new Carbon($to);

        $fromDate->startOfDay();
        $from = $fromDate->format($this->timeFormat);

        $toDate->endOfDay();
        $to = $toDate->format($this->timeFormat);

        if($fromDate->greaterThan($toDate)){
            toastr()->error('From cannot a be a date after To date');
            return back()->withInput();
        }
        $report         = Auth::user()->tradeIncome->whereBetween('created_at',[$from, $to]);
        $days           = $fromDate->diffInDays($toDate)+1;
        $paymentsData   = array_fill(0, $days, 0);

        $labelsArray= [];
        for($i=1; $i <= $days; $i++, $fromDate->addDay())
        {
            $label = $fromDate->format('m/d/y');
            array_push($labelsArray, $label);
            foreach($report as $r)
            {
                if($r->created_at->format('d') == $fromDate->day && $r->created_at->format('m') == $fromDate->month && $r->created_at->format('Y') == $fromDate->year)
                {
                    // payment data
                    $paymentsData[$i-1]     = $r->price;
                }
            }
        }
        $data['default_to']   = $to;
        $data['default_from'] = $from;
        $data['payments']    = implode(', ', $paymentsData);
        $data['labels']      = "'".implode("', '", $labelsArray)."'";
        return view('user.earning.trade_income')->with('data', $data);
    } 
    public function direct_income(Request $request)
    {
        $data['default_to']   = date($this->timeFormat);
        $data['default_from'] = date($this->timeFormat, strtotime("-30 days", strtotime($data['default_to'])));

        $to     = $request->input('to');
        $from   = $request->input('from');

        if(empty($to))
        {
            $to = $data['default_to'];
        }

        if(empty($from))
        {
            $from = $data['default_from'];
        }

        //-01 tells that it is date in yyyy-mm format not in timestamp format
        $fromDate       = new Carbon($from);
        $toDate         = new Carbon($to);

        $fromDate->startOfDay();
        $from = $fromDate->format($this->timeFormat);

        $toDate->endOfDay();
        $to = $toDate->format($this->timeFormat);

        if($fromDate->greaterThan($toDate)){
            toastr()->error('From cannot a be a date after To date');
            return back()->withInput();
        }
        $report         = Auth::user()->directIncome->whereBetween('created_at',[$from, $to]);
        $days           = $fromDate->diffInDays($toDate)+1;
        $paymentsData   = array_fill(0, $days, 0);

        $labelsArray= [];
        for($i=1; $i <= $days; $i++, $fromDate->addDay())
        {
            $label = $fromDate->format('m/d/y');
            array_push($labelsArray, $label);
            foreach($report as $r)
            {
                if($r->created_at->format('d') == $fromDate->day && $r->created_at->format('m') == $fromDate->month && $r->created_at->format('Y') == $fromDate->year)
                {
                    // payment data
                    $paymentsData[$i-1]     = $r->price;
                }
            }
        }
        $data['default_to']   = $to;
        $data['default_from'] = $from;
        $data['payments']    = implode(', ', $paymentsData);
        $data['labels']      = "'".implode("', '", $labelsArray)."'";
        return view('user.earning.direct_income')->with('data', $data);
    } 
    public function direct_team_income(Request $request)
    {
        $data['default_to']   = date($this->timeFormat);
        $data['default_from'] = date($this->timeFormat, strtotime("-30 days", strtotime($data['default_to'])));

        $to     = $request->input('to');
        $from   = $request->input('from');

        if(empty($to))
        {
            $to = $data['default_to'];
        }

        if(empty($from))
        {
            $from = $data['default_from'];
        }

        //-01 tells that it is date in yyyy-mm format not in timestamp format
        $fromDate       = new Carbon($from);
        $toDate         = new Carbon($to);

        $fromDate->startOfDay();
        $from = $fromDate->format($this->timeFormat);

        $toDate->endOfDay();
        $to = $toDate->format($this->timeFormat);

        if($fromDate->greaterThan($toDate)){
            toastr()->error('From cannot a be a date after To date');
            return back()->withInput();
        }
        $report         = Auth::user()->directTeamIncome->whereBetween('created_at',[$from, $to]);
        $days           = $fromDate->diffInDays($toDate)+1;
        $paymentsData   = array_fill(0, $days, 0);

        $labelsArray= [];
        for($i=1; $i <= $days; $i++, $fromDate->addDay())
        {
            $label = $fromDate->format('m/d/y');
            array_push($labelsArray, $label);
            foreach($report as $r)
            {
                if($r->created_at->format('d') == $fromDate->day && $r->created_at->format('m') == $fromDate->month && $r->created_at->format('Y') == $fromDate->year)
                {
                    // payment data
                    $paymentsData[$i-1]     = $r->price;
                }
            }
        }
        $data['default_to']   = $to;
        $data['default_from'] = $from;
        $data['payments']    = implode(', ', $paymentsData);
        $data['labels']      = "'".implode("', '", $labelsArray)."'";
        return view('user.earning.direct_team_income')->with('data', $data);
    } 
    public function upline_income(Request $request)
    {
        $data['default_to']   = date($this->timeFormat);
        $data['default_from'] = date($this->timeFormat, strtotime("-30 days", strtotime($data['default_to'])));

        $to     = $request->input('to');
        $from   = $request->input('from');

        if(empty($to))
        {
            $to = $data['default_to'];
        }

        if(empty($from))
        {
            $from = $data['default_from'];
        }

        //-01 tells that it is date in yyyy-mm format not in timestamp format
        $fromDate       = new Carbon($from);
        $toDate         = new Carbon($to);

        $fromDate->startOfDay();
        $from = $fromDate->format($this->timeFormat);

        $toDate->endOfDay();
        $to = $toDate->format($this->timeFormat);

        if($fromDate->greaterThan($toDate)){
            toastr()->error('From cannot a be a date after To date');
            return back()->withInput();
        }
        $report         = Auth::user()->uplineIncome->whereBetween('created_at',[$from, $to]);
        $days           = $fromDate->diffInDays($toDate)+1;
        $paymentsData   = array_fill(0, $days, 0);

        $labelsArray= [];
        for($i=1; $i <= $days; $i++, $fromDate->addDay())
        {
            $label = $fromDate->format('m/d/y');
            array_push($labelsArray, $label);
            foreach($report as $r)
            {
                if($r->created_at->format('d') == $fromDate->day && $r->created_at->format('m') == $fromDate->month && $r->created_at->format('Y') == $fromDate->year)
                {
                    // payment data
                    $paymentsData[$i-1]     = $r->price;
                }
            }
        }
        $data['default_to']   = $to;
        $data['default_from'] = $from;
        $data['payments']    = implode(', ', $paymentsData);
        $data['labels']      = "'".implode("', '", $labelsArray)."'";         
        return view('user.earning.upline_income')->with('data', $data);
    }
    public function down_line_income(Request $request)
    {
        $data['default_to']   = date($this->timeFormat);
        $data['default_from'] = date($this->timeFormat, strtotime("-30 days", strtotime($data['default_to'])));

        $to     = $request->input('to');
        $from   = $request->input('from');

        if(empty($to))
        {
            $to = $data['default_to'];
        }

        if(empty($from))
        {
            $from = $data['default_from'];
        }

        //-01 tells that it is date in yyyy-mm format not in timestamp format
        $fromDate       = new Carbon($from);
        $toDate         = new Carbon($to);

        $fromDate->startOfDay();
        $from = $fromDate->format($this->timeFormat);

        $toDate->endOfDay();
        $to = $toDate->format($this->timeFormat);

        if($fromDate->greaterThan($toDate)){
            toastr()->error('From cannot a be a date after To date');
            return back()->withInput();
        }
        $report         = Auth::user()->downlineIncome->whereBetween('created_at',[$from, $to]);
        $days           = $fromDate->diffInDays($toDate)+1;
        $paymentsData   = array_fill(0, $days, 0);

        $labelsArray= [];
        for($i=1; $i <= $days; $i++, $fromDate->addDay())
        {
            $label = $fromDate->format('m/d/y');
            array_push($labelsArray, $label);
            foreach($report as $r)
            {
                if($r->created_at->format('d') == $fromDate->day && $r->created_at->format('m') == $fromDate->month && $r->created_at->format('Y') == $fromDate->year)
                {
                    // payment data
                    $paymentsData[$i-1]     = $r->price;
                }
            }
        }
        $data['default_to']   = $to;
        $data['default_from'] = $from;
        $data['payments']    = implode(', ', $paymentsData);
        $data['labels']      = "'".implode("', '", $labelsArray)."'";         
        return view('user.earning.down_line_income')->with('data', $data);
    }
    public function upline_placement_income(Request $request)
    {
        $data['default_to']   = date($this->timeFormat);
        $data['default_from'] = date($this->timeFormat, strtotime("-30 days", strtotime($data['default_to'])));

        $to     = $request->input('to');
        $from   = $request->input('from');

        if(empty($to))
        {
            $to = $data['default_to'];
        }

        if(empty($from))
        {
            $from = $data['default_from'];
        }

        //-01 tells that it is date in yyyy-mm format not in timestamp format
        $fromDate       = new Carbon($from);
        $toDate         = new Carbon($to);

        $fromDate->startOfDay();
        $from = $fromDate->format($this->timeFormat);

        $toDate->endOfDay();
        $to = $toDate->format($this->timeFormat);

        if($fromDate->greaterThan($toDate)){
            toastr()->error('From cannot a be a date after To date');
            return back()->withInput();
        }
        $report         = Auth::user()->uplinePlacementIncome->whereBetween('created_at',[$from, $to]);
        $days           = $fromDate->diffInDays($toDate)+1;
        $paymentsData   = array_fill(0, $days, 0);

        $labelsArray= [];
        for($i=1; $i <= $days; $i++, $fromDate->addDay())
        {
            $label = $fromDate->format('m/d/y');
            array_push($labelsArray, $label);
            foreach($report as $r)
            {
                if($r->created_at->format('d') == $fromDate->day && $r->created_at->format('m') == $fromDate->month && $r->created_at->format('Y') == $fromDate->year)
                {
                    // payment data
                    $paymentsData[$i-1]     = $r->price;
                }
            }
        }
        $data['default_to']   = $to;
        $data['default_from'] = $from;
        $data['payments']    = implode(', ', $paymentsData);
        $data['labels']      = "'".implode("', '", $labelsArray)."'";         
        return view('user.earning.upline_placement_income')->with('data', $data);
    }
    public function down_line_placement_income(Request $request)
    {
        $data['default_to']   = date($this->timeFormat);
        $data['default_from'] = date($this->timeFormat, strtotime("-30 days", strtotime($data['default_to'])));

        $to     = $request->input('to');
        $from   = $request->input('from');

        if(empty($to))
        {
            $to = $data['default_to'];
        }

        if(empty($from))
        {
            $from = $data['default_from'];
        }

        //-01 tells that it is date in yyyy-mm format not in timestamp format
        $fromDate       = new Carbon($from);
        $toDate         = new Carbon($to);

        $fromDate->startOfDay();
        $from = $fromDate->format($this->timeFormat);

        $toDate->endOfDay();
        $to = $toDate->format($this->timeFormat);

        if($fromDate->greaterThan($toDate)){
            toastr()->error('From cannot a be a date after To date');
            return back()->withInput();
        }
        $report         = Auth::user()->downlinePlacementIncome->whereBetween('created_at',[$from, $to]);
        $days           = $fromDate->diffInDays($toDate)+1;
        $paymentsData   = array_fill(0, $days, 0);

        $labelsArray= [];
        for($i=1; $i <= $days; $i++, $fromDate->addDay())
        {
            $label = $fromDate->format('m/d/y');
            array_push($labelsArray, $label);
            foreach($report as $r)
            {
                if($r->created_at->format('d') == $fromDate->day && $r->created_at->format('m') == $fromDate->month && $r->created_at->format('Y') == $fromDate->year)
                {
                    // payment data
                    $paymentsData[$i-1]     = $r->price;
                }
            }
        }
        $data['default_to']   = $to;
        $data['default_from'] = $from;
        $data['payments']    = implode(', ', $paymentsData);
        $data['labels']      = "'".implode("', '", $labelsArray)."'";         
        return view('user.earning.down_line_placement_income')->with('data', $data);
    }
    public function ranking_income(Request $request)
    {
        $data['default_to']   = date($this->timeFormat);
        $data['default_from'] = date($this->timeFormat, strtotime("-30 days", strtotime($data['default_to'])));

        $to     = $request->input('to');
        $from   = $request->input('from');

        if(empty($to))
        {
            $to = $data['default_to'];
        }

        if(empty($from))
        {
            $from = $data['default_from'];
        }

        //-01 tells that it is date in yyyy-mm format not in timestamp format
        $fromDate       = new Carbon($from);
        $toDate         = new Carbon($to);

        $fromDate->startOfDay();
        $from = $fromDate->format($this->timeFormat);

        $toDate->endOfDay();
        $to = $toDate->format($this->timeFormat);

        if($fromDate->greaterThan($toDate)){
            toastr()->error('From cannot a be a date after To date');
            return back()->withInput();
        }
        $report         = Auth::user()->rankingIncome->whereBetween('created_at',[$from, $to]);
        $days           = $fromDate->diffInDays($toDate)+1;
        $paymentsData   = array_fill(0, $days, 0);

        $labelsArray= [];
        for($i=1; $i <= $days; $i++, $fromDate->addDay())
        {
            $label = $fromDate->format('m/d/y');
            array_push($labelsArray, $label);
            foreach($report as $r)
            {
                if($r->created_at->format('d') == $fromDate->day && $r->created_at->format('m') == $fromDate->month && $r->created_at->format('Y') == $fromDate->year)
                {
                    // payment data
                    $paymentsData[$i-1]     = $r->price;
                }
            }
        }
        $data['default_to']   = $to;
        $data['default_from'] = $from;
        $data['payments']    = implode(', ', $paymentsData);
        $data['labels']      = "'".implode("', '", $labelsArray)."'";         
        return view('user.earning.ranking_income')->with('data', $data);
    }
    public function associated_income(Request $request)
    {
        $data['default_to']   = date($this->timeFormat);
        $data['default_from'] = date($this->timeFormat, strtotime("-30 days", strtotime($data['default_to'])));
        $to     = $request->input('to');
        $from   = $request->input('from');

        if(empty($to))
        {
            $to = $data['default_to'];
        }

        if(empty($from))
        {
            $from = $data['default_from'];
        }

        //-01 tells that it is date in yyyy-mm format not in timestamp format
        $fromDate       = new Carbon($from);
        $toDate         = new Carbon($to);

        $fromDate->startOfDay();
        $from = $fromDate->format($this->timeFormat);

        $toDate->endOfDay();
        $to = $toDate->format($this->timeFormat);

        if($fromDate->greaterThan($toDate)){
            toastr()->error('From cannot a be a date after To date');
            return back()->withInput();
        }
        $report         = Auth::user()->associatedIncome->whereBetween('created_at',[$from, $to]);
        $days           = $fromDate->diffInDays($toDate)+1;
        $paymentsData   = array_fill(0, $days, 0);

        $labelsArray= [];
        for($i=1; $i <= $days; $i++, $fromDate->addDay())
        {
            $label = $fromDate->format('m/d/y');
            array_push($labelsArray, $label);
            foreach($report as $r)
            {
                if($r->created_at->format('d') == $fromDate->day && $r->created_at->format('m') == $fromDate->month && $r->created_at->format('Y') == $fromDate->year)
                {
                    // payment data
                    $paymentsData[$i-1]     = $r->price;
                }
            }
        }
        $data['default_to']   = $to;
        $data['default_from'] = $from;
        $data['payments']    = implode(', ', $paymentsData);
        $data['labels']      = "'".implode("', '", $labelsArray)."'";         
        return view('user.earning.associated_income')->with('data', $data);
    }
    public function overall_earning(Request $request)
    {
        $data['default_to']   = date($this->timeFormat);
        $data['default_from'] = date($this->timeFormat, strtotime("-30 days", strtotime($data['default_to'])));

        $to     = $request->input('to');
        $from   = $request->input('from');

        if(empty($to))
        {
            $to = $data['default_to'];
        }

        if(empty($from))
        {
            $from = $data['default_from'];
        }

        //-01 tells that it is date in yyyy-mm format not in timestamp format
        $fromDate       = new Carbon($from);
        $toDate         = new Carbon($to);

        $fromDate->startOfDay();
        $from = $fromDate->format($this->timeFormat);

        $toDate->endOfDay();
        $to = $toDate->format($this->timeFormat);

        if($fromDate->greaterThan($toDate)){
            Session::flash('error', 'From cannot a be a date after To date');
            return back()->withInput();
        }

        $labelsArray   = [
            "Direct Income", 
            "Direct Team Income", 
            "Upline Income", 
            "Downline Income", 
            "Upline Placement Income",
            "Downline Placement Income",
            "Trade Income",
            "Ranking Income",
            "Assoicated Income"
        ];
        $packagesData   = [
            Auth::user()->directIncome->whereBetween('created_at',[$from, $to])->sum('price'),
            Auth::user()->directTeamIncome->whereBetween('created_at',[$from, $to])->sum('price'),
            Auth::user()->uplineIncome->whereBetween('created_at',[$from, $to])->sum('price'),
            Auth::user()->downlineIncome->whereBetween('created_at',[$from, $to])->sum('price'),
            Auth::user()->uplinePlacementIncome->whereBetween('created_at',[$from, $to])->sum('price'),
            Auth::user()->downlinePlacementIncome->whereBetween('created_at',[$from, $to])->sum('price'),
            Auth::user()->tradeIncome->whereBetween('created_at',[$from, $to])->sum('price'),
            Auth::user()->rankingIncome->whereBetween('created_at',[$from, $to])->sum('price'),
            Auth::user()->associatedIncome->whereBetween('created_at',[$from, $to])->sum('price'),

        ];

        $data['packages']       = "'".implode("', '", $packagesData)."'";
        $data['packagesCount']  = 7;
        $data['labels']         = "'".implode("', '", $labelsArray)."'";
        $data['labelsArray']    = $labelsArray;  
        return view('user.report.over_all_earning')->with('data', $data);
    }
}
