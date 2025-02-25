<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\City;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->input('search');
        $customers = Customer::when($search, function ($query, $search) {
            return $query->where('cust_name', 'like', "%{$search}%")
                ->orWhere('cust_code', 'like', "%{$search}%")
                ->orWhere('city_name', 'like', "%{$search}%");
        })->get();

        return view('customers.index', compact('customers', 'search'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $cities = City::all();
        return view('customers.create', compact('cities'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'cust_name' => 'required',
            'cust_code' => 'required|unique:customers,cust_code',
            'cust_address' => 'required',
            'city_id' => 'required|exists:cities,id',
        ]);

        Customer::create($request->all());

        return redirect()->route('customers.index')->with('success', 'Customer berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Customer $customer)
    {
        return view('customers.show', compact('customer'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Customer $customer)
    {
        return view('customers.edit', compact('customer'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Customer $customer)
    {
        $request->validate([
            'cust_name' => 'required',
            'cust_code' => 'required|unique:customers,cust_code,' . $customer->cust_id . ',cust_id',
            'cust_address' => 'required',
            'city_id' => 'required',
            'city_name' => 'required',
        ]);

        $customer->update($request->all());

        return redirect()->route('customers.index')->with('success', 'Customer updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Customer $customer)
    {
        $customer->delete();
        return redirect()->route('customers.index')->with('success', 'Customer deleted successfully.');
    }

    public function map()
    {
        $customers = Customer::select('cust_name', 'city_name')->get();
        // dd($customers);
        return view('customers.map', compact('customers'));
    }
}
