<?php

namespace App\Http\Controllers;

use App\Models\Customers;
use Illuminate\Http\Request;

class CustomersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $customers = Customers::all();

        return view('customer', compact('customers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $customer = new Customers;
        $customer->name = $request->name;
        $customer->address = $request->address;
        $customer->phone = $request->phone;
        $customer->cardID = $request->cardID;
        $customer->save();

        return redirect()->route('customer.index')->with('success','Customer has been added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Customers $customers)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Customers $customer)
    {
        return view('editCustomer' , ['customer'=> $customer]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Customers $customer)
    {
        $request->validate([
            'name' => 'required',
            'address' => 'required',
            'phone' => 'required',
            'cardID' => 'required',
        ]);
        
        Customers::where('id', $customer->id)
        ->update(
            [
                'name'=> $request->name,
                'address'=> $request->address,
                'phone'=> $request->phone,
                'cardID'=> $request->cardID,
            ]
            );

        return redirect()->route('customer.index')->with('success','Customer has been updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Customers $customer)
    {
        $customer->delete();
        return redirect()->route('customer.index')->with('success','Customer has been deleted successfully');
    }
}
