<?php

namespace App\Http\Controllers;

use App\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index()
    {
        $customers = Customer::all();

        return view('customer.index', compact('customers'));
    }

    public function create()
    {
        return view('customer.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string'],
            'email' => ['required', 'email', 'unique:customers']
        ]);

        Customer::create($validated);

        return redirect()->route('customers.index');
    }

    public function show(Customer $customer)
    {
        return view('customer.show', compact('customer'));
    }
}
