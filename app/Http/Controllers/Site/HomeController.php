<?php

namespace App\Http\Controllers\Site;

use App\Events;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $events = Events::all();
        return view('site/home', ['events' => $events]);
    }
}
