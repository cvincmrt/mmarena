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
            ->with('success', 'Služba bola úspešne vytvorená!');
    }

    public function show(Service $service)
    {
        return view('services.show', compact('service'));
    }

    public function adminIndex()
    {
        $services = Service::orderBy('id', 'desc')->get();

        return view('services.admin.index', compact('services'));
    }

    public function edit(Service $service)
    {
        return view('services.admin.edit', compact('service'));
    }

    public function update(Request $request, Service $service)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
        ]);

        $service->update($validated);

        return redirect()
            ->route('admin.services.index')
            ->with('success', 'Sluzba bola uspesne upravena!!!');
    }

    public function destroy(Service $service)
    {
        $service->delete();

        return redirect()
            ->route('admin.services.index')
            ->with('success', 'Služba bola úspešne odstránená!');
    }

    public function changeStatus(Service $service)
    {
        if($service->is_active == true){
            $service->is_active = false;
        }
        else{
            $service->is_active = true;
        }

        $service->save();

        return redirect()
            ->route('admin.services.index')
            ->with('success', 'Sluzba uspesne zmenila stav');
    }
}
