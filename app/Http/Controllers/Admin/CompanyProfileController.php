<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Company;
use Illuminate\Http\Request;

class CompanyProfileController extends Controller
{
    public function index(Company $company)
    {
        $company ->load(['user', 'athletes', 'plan']);

        return view('admin.companies.profile', compact('company'));
    }
}