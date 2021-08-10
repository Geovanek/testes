<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Plan;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    public function index()
    {
        $plans = Plan::where('active', true)->with('details')->get();
 
        return view('front.index', compact('plans'));
    }

    public function subscriptionPlan($uuid)
    {
        if (!$plan = Plan::where('uuid', $uuid)->first()) {
            return redirect()->back();
        }

        session()->put('plan', $plan);

        return view('front.subscription', compact('plan'));
    }
}
