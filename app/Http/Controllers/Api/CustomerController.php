<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Customer;
use Illuminate\Validation\ValidationException;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $customers = Customer::select('cust_id', 'cust_name', 'cust_code', 'cust_address', 'city_id', 'city_name')->get();
        
        return response()->json([
            'status' => 'success',
            'data' => $customers
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            // Validasi input
            $validated = $request->validate([
                'cust_name' => 'required|string|max:255',
                'cust_code' => 'required|string|max:10|unique:customers,cust_code',
                'cust_address' => 'required|string|max:255',
                'city_id' => 'required|integer',
                'city_name' => 'required|string|max:100',
            ]);

            // Simpan ke database
            $customer = Customer::create($validated);

            return response()->json([
                'status' => 'success',
                'message' => 'Customer berhasil ditambahkan',
                'data' => $customer
            ], 201);
        } catch (ValidationException $e) {
            return response()->json(['status' => 'error', 'message' => $e->errors()], 422);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        try {
            // Cari customer berdasarkan ID
            $customer = Customer::find($id);
            if (!$customer) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Customer tidak ditemukan'
                ], 404);
            }

            // Validasi input
            $validated = $request->validate([
                'cust_name' => 'sometimes|string|max:255',
                'cust_code' => 'sometimes|string|max:10|unique:customers,cust_code,' . $id . ',cust_id',
                'cust_address' => 'sometimes|string|max:255',
                'city_id' => 'sometimes|integer',
                'city_name' => 'sometimes|string|max:100',
            ]);

            // Update data
            $customer->update($validated);

            return response()->json([
                'status' => 'success',
                'message' => 'Customer berhasil diperbarui',
                'data' => $customer
            ], 200);
        } catch (ValidationException $e) {
            return response()->json(['status' => 'error', 'message' => $e->errors()], 422);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
