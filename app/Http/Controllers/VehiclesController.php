<?php

namespace App\Http\Controllers;

use App\Models\Cars;
use App\Models\Motorbikes;
use App\Models\Trucks;
use App\Models\Vehicles;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VehiclesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $vehicles = Vehicles::all();

        return view('dashboard', compact('vehicles'));
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
        $request->validate([

            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',

        ]);

    

        $imageName = time().'.'.$request->image->extension();  

     

        $request->image->storeAs('public/images', $imageName);

  

        /* Store $imageName name in DATABASE from HERE */
        $vehicle = new Vehicles;
        $vehicle->model = $request->name;
        $vehicle->year = $request->year;
        $vehicle->totalPassenger = $request->totalPassenger;
        $vehicle->manufacture = $request->manufacture;
        $vehicle->price = $request->price;
        $vehicle->imagePath = $imageName;

        if ($request->typeButton == "Car") {
            $request->validate([
                'trunkSize' => 'required',
                'fuelType' => 'required'
            ]);
            $car = new Cars;
            $car->fuelType = $request->fuelType;
            $car->trunkSize = $request->trunkSize;
            $vehicle->save();
            $vehicle->car()->save($car);
        } else if ($request->typeButton == "Truck") {
            $request->validate([
                'tiresCount' => 'required',
                'cargoSize' => 'required'
            ]);
            $truck = new Trucks;
            $truck->tiresCount = $request->tiresCount;
            $truck->cargoSize = $request->cargoSize;
            $vehicle->save();
            $vehicle->car()->save($truck);
        } else if ($request->typeButton == "Motorbike") {
            $request->validate([
                'storageSize' => 'required',
                'fuelCapacity' => 'required'
            ]);
            $motorbike = new Motorbikes;
            $motorbike->storageSize = $request->storageSize;
            $motorbike->fuelCapacity = $request->fuelCapacity;
            $vehicle->save();
            $vehicle->car()->save($motorbike);
        }

        return redirect()->route('vehicle.index')->with('success', 'Vehicles has been added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Vehicles $vehicle)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Vehicles $vehicle)
    {
        return view('editVehicle', ['vehicle' => $vehicle]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Vehicles $vehicle)
    {
        $request->validate([
            'name' => 'required',
            'year' => 'required',
            'totalPassenger' => 'required',
            'manufacture' => 'required',
            'price' => 'required',
        ]);

        Vehicles::where('id', $vehicle->id)
            ->update(
                [
                    'model' => $request->name,
                    'year' => $request->year,
                    'totalPassenger' => $request->totalPassenger,
                    'manufacture' => $request->manufacture,
                    'price' => $request->price,
                ]
            );

        if ($vehicle->car) {
            $request->validate([
                'trunkSize' => 'required',
                'fuelType' => 'required'
            ]);
            Cars::where('vehicles_id', $vehicle->id)
                ->update(
                    [
                        'trunkSize' => $request->trunkSize,
                        'fuelType' => $request->fuelType,
                    ]
                );
        } else if ($vehicle->truck) {
            $request->validate([
                'tiresCount' => 'required',
                'cargoSize' => 'required'
            ]);
            Trucks::where('vehicles_id', $vehicle->id)
                ->update(
                    [
                        'tiresCount' => $request->tiresCount,
                        'cargoSize' => $request->cargoSize,
                    ]
                );
        } else if ($vehicle->motorbike) {
            $request->validate([
                'storageSize' => 'required',
                'fuelCapacity' => 'required'
            ]);
            Motorbikes::where('vehicles_id', $vehicle->id)
                ->update(
                    [
                        'storageSize' => $request->storageSize,
                        'fuelCapacity' => $request->fuelCapacity,
                    ]
                );
        }

        return redirect()->route('vehicle.index')->with('success', 'Vehicles has been updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Vehicles $vehicle)
    {
        $vehicle->delete();
        
        return redirect()->route('vehicle.index')->with('success', 'Vehicles has been deleted successfully');
    }
}
