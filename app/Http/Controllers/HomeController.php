<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $nazovAreny = "MM Arena";
        $mesto = "Ostrava";
        $pocetKlzisk = 1;

        return view('home', compact('nazovAreny', 'mesto', 'pocetKlzisk'));
    }
}
