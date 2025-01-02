<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Event;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $companies = Company::query()->where('status', 'approved')->select(['website','logo','name','description'])->get();
        $events = Event::with('user', 'media')
            ->where('is_active', true)
            ->select(['title','description','start_date','end_date','location','max_participants','event_banner'])->get();
        return view('welcome', compact('companies', 'events'));
    }
}
