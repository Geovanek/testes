<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Extension;
use App\Models\Plan;

class PlanExtensionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Plan $plan)
    {
        $extensions = Extension::where('active', true)->get();

        return view('admin.plans.planExtensions.index', compact('plan', 'extensions'));
    }
}
