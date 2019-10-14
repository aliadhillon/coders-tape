<?php

namespace App\Http\Controllers;

use App\Service;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::all();

        return view('service.index', compact('services'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => [
                'required',
                'min:5',
                'max:255',
                Rule::unique('services')
                ]
        ]);
        Service::create($validated);

        return redirect()->back();
    }
}
