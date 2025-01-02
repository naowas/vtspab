<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $companies = Company::query()->where('status', 'approved')->select(['website','logo','name','description'])->get();
        return view('welcome', compact('companies'));
    }
}
