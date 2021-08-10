<?php

namespace App\Http\Controllers\Athlete;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AthleteController extends Controller
{
    public function index()
    {
        return view('athlete.dashboard');
    }
}
