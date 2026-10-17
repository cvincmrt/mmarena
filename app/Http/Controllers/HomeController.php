<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;

class HomeController extends Controller
{
    public function index()
    {
        $nazovAreny = "MM Arena";
        $mesto = "Ostrava";
        $pocetKlzisk = 1;

        $sluzby = Service::where('is_active', true)->orderBy('price')->limit(3)->get();


        return view('home', compact('nazovAreny', 'mesto', 'pocetKlzisk', 'sluzby'));
    }

    public function contact()
    {
        return view('contact');
    }
}
