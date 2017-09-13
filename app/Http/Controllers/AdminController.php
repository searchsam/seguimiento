<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Carbon\Carbon;

class AdminController extends Controller
{
    public function fecha()
    {
        $date = Carbon::now();
        dd(str_random(10));
        return view('administrador.errata')->with(['data' => $date]);
    }

}
