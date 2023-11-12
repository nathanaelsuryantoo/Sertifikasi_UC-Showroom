@foreach ($vehicles as $vehicle)
    <p>{{$vehicle->model}}</p>
    <p>{{$vehicle->year}}</p>
    <p>{{$vehicle->manufacture}}</p>
    <p>{{$vehicle->totalPassenger}}</p>
    @if ($vehicle->car){
        <p>{{$vehicle->car->fuelType}}</p>
        <p>{{$vehicle->car->trunkSize}}</p>
    }
    @elseif ($vehicle->truck){
        <p>{{$vehicle->truck->tiresCount}}</p>
        <p>{{$vehicle->truck->cargoSize}}</p>
    }
    @elseif ($vehicle->motorbike){
        <p>{{$vehicle->motorbike->storageSize}}</p>
        <p>{{$vehicle->motorbike->fuelCapacity}}</p>
    }
    @endif
@endforeach