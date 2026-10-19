<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;

class ServiceController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
        ]);

        //dd($validated); vypise zvalidovane hodnoty a zastavi program

        Service::create($validated);

        return redirect()
            ->route('home')
            ->with('success', 'Sluzba bola uspesne vytvorena');
    }
}
