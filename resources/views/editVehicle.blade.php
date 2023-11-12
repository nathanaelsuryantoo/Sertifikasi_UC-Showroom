<x-app-layout>
    <div class="fixed left-0 py-4 w-64 h-screen top-16">
        <div class="bg-gray-800 overflow-hidden shadow-sm sm:rounded-r-lg py-6 h-full px-3">
            <div class="text-3xl font-semibold text-white ml-2">Dashboard</div>
            <ul class="space-y-2 font-medium mt-6">
                <li>
                    <a class="flex hover:bg-gray-700 p-2 rounded-lg text-white">
                        <span class="material-symbols-outlined">
                            directions_car
                        </span>
                        <span class="ml-3 text-xl">Vehicle</span>
                    </a>
                </li>
                <li>
                    <a href="/customer" class="flex hover:bg-gray-700 p-2 rounded-lg text-white">
                        <span class="material-symbols-outlined">
                            person
                        </span>
                        <span class="ml-3 text-xl">Customer</span>
                    </a>
                </li>
                <li>
                    <a href="/order" class="flex bg-gray-700 p-2 rounded-lg text-white">
                        <span class="material-symbols-outlined">
                            receipt_long
                        </span>
                        <span class="ml-3 text-xl">Order</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>

    <div class="p-4 sm:ml-64 mt-16 text-white">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
                <form action="{{route('vehicle.update', ['vehicle'=>$vehicle])}}" method="POST" enctype="multipart/form-data" class="p-4 md:p-5" name="editVehicleForm" id="editVehicleForm">
                    @csrf
                    @method("PUT")
                    <div class="grid gap-4 mb-4 grid-cols-2">
                        <div class="col-span-2">
                            <label for="name"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Model</label>
                            <input type="text" name="name" id="name"
                               value="{{$vehicle->model}}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                placeholder="Type model name" required="">
                        </div>
                        <div class="col-span-2 sm:col-span-1">
                            <label for="year"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Year</label>
                            <input type="number" name="year" id="year"
                            value="{{$vehicle->year}}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                placeholder="2023" required="">
                        </div>
                        <div class="col-span-2 sm:col-span-1">
                            <label for="totalPassenger"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Total Passenger</label>
                            <input type="number" name="totalPassenger" id="totalPassenger"
                            value="{{$vehicle->totalPassenger}}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                placeholder="5" required="">
                        </div>
                        <div class="col-span-2">
                            <label for="manufacture"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Manufature</label>
                            <input type="text" name="manufacture" id="manufacture"
                            value="{{$vehicle->manufacture}}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                placeholder="Type Manufacture name" required="">
                        </div>
                        <div class="col-span-2">
                            <label for="price"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Price</label>
                            <input type="number" name="price" id="price"
                            value="{{$vehicle->price}}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                placeholder="1000000000" required="">
                        </div>
                            @if ($vehicle->car)
                            <div class="col-span-2 mb-2">
                                <label for="fuelType"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Fuel Type</label>
                                <input type="text" name="fuelType" id="fuelType"
                                value="{{$vehicle->car->fuelType}}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                    placeholder="Gasoline">
                            </div>
                            <div class="col-span-2">
                                <label for="trunkSize"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Trunk Area Size</label>
                                <input type="number" name="trunkSize" id="trunkSize"
                                value="{{$vehicle->car->trunkSize}}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                    placeholder="Type trunk area size in liters">
                            </div>
                        @elseif ($vehicle->truck)
                            <div class="col-span-2 mb-2">
                                <label for="tiresCount"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tires Count</label>
                                <input type="number" name="tiresCount" id="tiresCount"
                                value="{{$vehicle->truck->tiresCount}}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                    placeholder="8">
                            </div>
                            <div class="col-span-2">
                                <label for="cargoSize"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Cargo Area Size</label>
                                <input type="number" name="cargoSize" id="cargoSize"
                                value="{{$vehicle->truck->cargoSize}}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                    placeholder="Type cargo area size in liters">
                            </div>
                            @elseif ($vehicle->motorbike)
                            <div class="col-span-2 mb-2">
                                <label for="storageSize"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Storage Area Size</label>
                                <input type="number" name="storageSize" id="storageSize"
                                value="{{$vehicle->motorbike->storageSize}}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                    placeholder="Type storage area size in liters">
                            </div>
                            <div class="col-span-2">
                                <label for="fuelCapacity"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Fuel Capacity</label>
                                <input type="number" name="fuelCapacity" id="fuelCapacity"
                                value="{{$vehicle->motorbike->fuelCapacity}}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                    placeholder="60">
                            </div>
                            @endif
                    </div>
                    <button type="submit"
                        class="mt-4 text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        <span class="material-symbols-outlined mr-2">
                            edit
                        </span>
                        Edit Vehicle Data
                    </button>
                </form>
            </div>
        </div>
    </div>
    
</x-app-layout>
