<?php

namespace App\Http\Controllers;

use App\Models\Customers;
use App\Models\OrderItems;
use App\Models\Orders;
use App\Models\Vehicles;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orders = Orders::get();

        return view('order', compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $customers = Customers::all();
        $vehicles = Vehicles::all();

        return view('addOrder', compact(['customers', 'vehicles']));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'moreFields.*' => 'required',
            'customerID' => 'required'
        ]);

        $orders = new Orders;
        $orders->customer_id = $request->customerID;
        $orders->save();


        foreach ($request->moreFields as $key => $value) {
            $order_items = new OrderItems;
            $order_items->vehicles_id = (int)$value;
            $order_items->orders_id = $orders->id;
            $order_items->save();
        }

        return redirect()->route('order.index')->with('success', 'Customer has been added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Orders $order)
    {
        $vehicles = OrderItems::where('orders_id', $order->id)
            ->join('orders', 'orders.id', '=', 'orders_items.orders_id')
            ->join('vehicles', 'vehicles.id', '=', 'orders_items.vehicles_id')
            ->select('vehicles.price', 'vehicles.model', 'vehicles.year')
            ->get();


        return view('showOrder', compact('vehicles'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Orders $order)
    {
        $orderedVehicles = Vehicles::join('orders_items', 'orders_items.vehicles_id', '=', 'vehicles.id')
        ->where('orders_items.orders_id', $order->id)
        ->get();
        $vehicles = Vehicles::all();

        return view('editOrder', compact(['orderedVehicles', 'vehicles', 'order']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Orders $order)
    {
        $request->validate([
            'moreFields.*' => 'required',
        ]);

        foreach ($request->moreFields as $key => $value) {
            OrderItems::where('id', $key)
        ->update(
            [
                'vehicles_id'=> (int)$value,
            ]
            );
        }



        return redirect()->route('order.index')->with('success', 'Customer has been updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Orders $order)
    {
        //
    }
}
