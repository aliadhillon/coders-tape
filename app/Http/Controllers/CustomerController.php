<?php

namespace App\Http\Controllers;

use App\Customer;
use App\Events\CustomerDeleted;
use App\Events\NewCustomerAdded;
use Intervention\Image\Facades\Image;
use App\Http\Requests\CustomerRequest;
use Illuminate\Support\Facades\Storage;
use Alert;

class CustomerController extends Controller
{
    /**
     * Show all the Customers list
     *
     * @return View
     */
    public function index()
    {
        $customers = Customer::all();

        return view('customer.index', compact('customers'));
    }

    /**
     * Show the form for creating a new Customer
     *
     * @return View
     */
    public function create()
    {
        $customer = new Customer();
        return view('customer.create', compact('customer'));
    }

    /**
     * Store the New customer with the data coming from the request
     *
     * @param CustomerRequest $request
     * @return Redirect
     */
    public function store(CustomerRequest $request)
    {
        $validated = $this->validated($request);

        $customer = Customer::create($validated);

        event(new NewCustomerAdded($customer));

        // Alert::html('New Customer added', "<p>Name: {$customer->name}</p> <p>Email: {$customer->email}</p>", 'success');

        // Alert::success('New Customer Added', $customer->name);

        return redirect()->route('customers.show', compact('customer'))->with('success', 'New Customer Added: '. $customer->name);
    }

    /**
     * Show the Customer details
     *
     * @param Customer $customer
     * @return View
     */
    public function show(Customer $customer)
    {
        // dd($customer->toArray());
        return view('customer.show', compact('customer'));
    }

    /**
     * Show th edit page for Customer
     *
     * @param Customer $customer
     * @return View
     */
    public function edit(Customer $customer)
    {
        return view('customer.edit', compact('customer'));
    }

    /**
     * Update the Gien Customer with the given Request data
     *
     * @param CustomerRequest $request
     * @param Customer $customer
     * @return Redirect
     */
    public function update(CustomerRequest $request,Customer $customer)
    {   
        $validated = $this->validated($request, $customer);

        $customer->update($validated);

        // Alert::toast('Customer Updated Successfully', 'success')->position('center');

        return redirect()->route('customers.show', compact('customer'))->with('success', 'Customer Updated Successfully');
    }

    /**
     * Delte the given Customer
     *
     * @param Customer $customer
     * @return Redirect
     */
    public function destroy(Customer $customer)
    {
        $customer->delete();

        event(new CustomerDeleted($customer));

        return redirect()->route('customers.index')->with('msg', "Customer deleted: {$customer->name}");
    }

    public function validated($request, $customer = null)
    {
        $validated = $request->validated();

        if ($request->hasFile('image')) {
            if($customer && $customer->image){
                Storage::disk('uploads')->delete([$customer->image, 'small/' . $customer->image]);
            }
            $image = $request->image->store(null, 'uploads');
            // $image = Storage::disk('uploads')->putFile(null, $request->image);
            $validated['image'] = $image;
            $this->minify($image);
        }

        return $validated;
    }

    public function minify($image)
    {
        if(!Storage::disk('uploads')->exists('small')){
            Storage::disk('uploads')->makeDirectory('small');
        }
        if ($image) {
            Image::make(Storage::disk('uploads')->path($image))
                ->fit(300, 300)
                ->save(Storage::disk('uploads')->path('small/' . $image));
        }
    }
}
