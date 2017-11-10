<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Carbon\Carbon;

class AdminController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function fecha()
    {
        $date = Carbon::now();
        dd(str_random(10));
        return view('administrador.errata')->with(['data' => $date]);
    }

}
