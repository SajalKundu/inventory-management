<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index()
    {
        $customers = Customer::get();
        return view('customer.index', compact('customers'));
    }

    public function create()
    {
        return view('customer.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:191',
            'email' => 'nullable|email|max:255',
            'mobile' => 'required|string|min:11|max:11|unique:customers,mobile',
            'address' => 'nullable|string',
            'status' => 'required|in:active,inactive',
        ]);

        $customer          = new Customer();
        $customer->name    = $request->name;
        $customer->email   = $request->email ?? null;
        $customer->mobile  = $request->mobile;
        $customer->address = $request->address ?? null;
        $customer->status  = $request->status;
        $customer->save();

        return redirect()->route('admin.customer.index')->with('msg', 'Customer created successfully.');
    }

    public function edit($id)
    {
        $customer = Customer::findOrFail($id);
        return view('customer.edit', compact('customer'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name'    => 'required|string|max:255',
            'email'   => 'nullable|email|max:255',
            'mobile'  => 'required|string|min:11|max:11|unique:customers,mobile,'.$id,
            'address' => 'nullable|string',
            'status'  => 'required|in:active,inactive',
        ]);

        $customer          = Customer::findOrFail($id);
        $customer->name    = $request->name;
        $customer->email   = $request->email ?? null;
        $customer->mobile  = $request->mobile;
        $customer->address = $request->address ?? null;
        $customer->status  = $request->status;
        $customer->save();

        return redirect()->route('admin.customer.index')->with('msg', 'Customer updated successfully.');
    }

    public function destroy($id)
    {
        $customer = Customer::findOrFail($id);
        $customer->delete();

        return redirect()->route('admin.customer.index')->with('msg', 'Customer deleted successfully.');
    }

    public function changeStatus($id, $status)
    {
        $customer = Customer::findOrFail($id);
        $customer->status = $status;
        $customer->save();

        return redirect()->route('admin.customer.index')->with('msg', 'Customer status updated successfully.');
    }
}
