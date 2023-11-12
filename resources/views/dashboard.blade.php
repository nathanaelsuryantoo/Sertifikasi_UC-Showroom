<x-app-layout>
    <div class="fixed left-0 py-4 w-64 h-screen top-16">
        <div class="bg-gray-800 overflow-hidden shadow-sm sm:rounded-r-lg py-6 h-full px-3">
            <div class="text-3xl font-semibold text-white ml-2">Dashboard</div>
            <ul class="space-y-2 font-medium mt-6">
                <li>
                    <a class="flex bg-gray-700 p-2 rounded-lg text-white">
                        <span class="material-symbols-outlined">
                            directions_car
                        </span>
                        <span class="ml-3 text-xl">Vehicle</span>
                    </a>
                </li>
                <li>
                    <a href="customer" class="flex hover:bg-gray-700 p-2 rounded-lg text-white">
                        <span class="material-symbols-outlined">
                            person
                        </span>
                        <span class="ml-3 text-xl">Customer</span>
                    </a>
                </li>
                <li>
                    <a href="order" class="flex hover:bg-gray-700 p-2 rounded-lg text-white">
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
                <div class="flex justify-between py-4">
                    <div class="text-4xl font-semibold">All Vehicles</div>


                    <!-- Modal toggle -->
                    <button data-modal-target="crud-modal" data-modal-toggle="crud-modal"
                        class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                        type="button">
                        Add New Vehicle
                    </button>
                </div>
                <div class="overflow-x-auto shadow-md sm:rounded-lg border border-gray-600">
                    <table class="w-full text-left rtl:text-right text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    Vehicle Model
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Year
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Manufacture
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Total Passenger
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Price
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Type
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Fuel Type/ Tires Count/ Fuel Capacity
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Trunk/ Cargo/ Storage Sizes
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    <span class="sr-only">Edit</span>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                    @foreach ($vehicles as $vehicle)
                    <tr
                                class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                <th scope="row"
                                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{$vehicle->model}}
                                </th>
                                <td class="px-6 py-4">
                                    {{$vehicle->year}}
                                </td>
                                <td class="px-6 py-4">
                                    {{$vehicle->manufacture}}
                                </td>
                                <td class="px-6 py-4">
                                    {{$vehicle->totalPassenger}}
                                </td>
                                <td class="px-6 py-4">
                                    {{$vehicle->price}}
                                </td>
                                @if ($vehicle->car)
                                    <td class="px-6 py-4">
                                        Car
                                    </td>
                                    <td class="px-6 py-4">
                                        {{$vehicle->car->fuelType}}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{$vehicle->car->fuelType}}
                                    </td>
                                
                                @elseif ($vehicle->truck)
                                    <td class="px-6 py-4">
                                        Truck
                                    </td>
                                    <td class="px-6 py-4">
                                        {{$vehicle->truck->tiresCount}}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{$vehicle->truck->cargoSize}}
                                    </td>
                                
                                @elseif ($vehicle->motorbike)
                                    <td class="px-6 py-4">
                                        Motorbike
                                    </td>
                                    <td class="px-6 py-4">
                                        {{$vehicle->motorbike->storageSize}}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{$vehicle->motorbike->fuelCapacity}}
                                    </td>
                                
                                @endif
                                <td class="px-6 py-4 text-right">
                                    <form action="{{ route('vehicle.destroy', ['vehicle'=>$vehicle])}}" method="POST">
                                        <a class="m-1 inline-flex text-white focus:ring-4 focus:outline-none font-medium rounded-lg text-sm px-2 py-1.5 text-center bg-blue-600 hover:bg-blue-700 focus:ring-blue-800" 
                                        href="{{ route('vehicle.edit', ['vehicle'=>$vehicle]) }}">
                                            <span class="material-symbols-outlined">
                                                edit
                                            </span>
                                        </a>
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="m-1 inline-flex text-white focus:ring-4 focus:outline-none font-medium rounded-lg text-sm px-2 py-1.5 text-center bg-red-600 hover:bg-red-700 focus:ring-red-800">
                                            <span class="material-symbols-outlined">
                                                delete
                                            </span></button>
                                    </form>
                                </td>
                            </tr>
                   
                            @endforeach
                            
                            
                        </tbody>
                    </table>
                    
                    
                </div>
            </div>
        </div>
    </div>

    <!-- Main modal -->
    <div id="crud-modal" tabindex="-1" aria-hidden="true"
        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-md max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <!-- Modal header -->
                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                        Add New Car
                    </h3>
                    <button type="button"
                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                        data-modal-toggle="crud-modal">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <!-- Modal body -->
                <form action="{{route('vehicle.store')}}" method="POST" class="p-4 md:p-5">
                    @csrf
                    <div class="grid gap-4 mb-4 grid-cols-2">
                        <div class="col-span-2">
                            <label for="name"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Model</label>
                            <input type="text" name="name" id="name"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                placeholder="Type model name" required="">
                        </div>
                        <div class="col-span-2 sm:col-span-1">
                            <label for="year"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Year</label>
                            <input type="number" name="year" id="year"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                placeholder="2023" required="">
                        </div>
                        <div class="col-span-2 sm:col-span-1">
                            <label for="totalPassenger"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Total Passenger</label>
                            <input type="number" name="totalPassenger" id="totalPassenger"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                placeholder="5" required="">
                        </div>
                        <div class="col-span-2">
                            <label for="manufacture"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Manufature</label>
                            <input type="text" name="manufacture" id="manufacture"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                placeholder="Type Manufacture name" required="">
                        </div>
                        <div class="col-span-2">
                            <label for="price"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Price</label>
                            <input type="number" name="price" id="price"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                placeholder="1000000000" required="">
                        </div>
                        <div class="col-span-2">
                            <div class="text-white text-sm font-medium mb-2">Select Type</div>
                            <div id="carButton" class="border border-transparent text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" onclick="carsSelected()">Cars</div>
                            <div id="truckButton" class="mx-1 border border-transparent text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" onclick="truckSelected()">Truck</div>
                            <div id="motorbikeButton" class="border border-transparent text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" onclick="motorbikeSelected()">Motorbike</div> 
                        </div>
                        <input type="hidden" name="typeButton" id="typeButton">
                        <div id="carSelectedDiv" class="hidden col-span-2">
                            <div class="col-span-2 mb-2">
                                <label for="fuelType"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Fuel Type</label>
                                <input type="text" name="fuelType" id="fuelType"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                    placeholder="Gasoline">
                            </div>
                            <div class="col-span-2">
                                <label for="trunkSize"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Trunk Area Size</label>
                                <input type="number" name="trunkSize" id="trunkSize"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                    placeholder="Type trunk area size in liters">
                            </div>
                        </div>
                        <div id="truckSelectedDiv" class="hidden col-span-2">
                            <div class="col-span-2 mb-2">
                                <label for="tiresCount"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tires Count</label>
                                <input type="number" name="tiresCount" id="tiresCount"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                    placeholder="8">
                            </div>
                            <div class="col-span-2">
                                <label for="cargoSize"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Cargo Area Size</label>
                                <input type="number" name="cargoSize" id="cargoSize"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                    placeholder="Type cargo area size in liters">
                            </div>
                        </div>
                        <div id="motorbikeSelectedDiv" class="hidden col-span-2">
                            <div class="col-span-2 mb-2">
                                <label for="storageSize"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Storage Area Size</label>
                                <input type="number" name="storageSize" id="storageSize"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                    placeholder="Type storage area size in liters">
                            </div>
                            <div class="col-span-2">
                                <label for="fuelCapacity"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Fuel Capacity</label>
                                <input type="number" name="fuelCapacity" id="fuelCapacity"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                    placeholder="60">
                            </div>
                        </div>
                    </div>
                    <button type="submit"
                        class="text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        <svg class="me-1 -ms-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
                                clip-rule="evenodd"></path>
                        </svg>
                        Add new car
                    </button>
                </form>
            </div>
        </div>
    </div>
    <script>
    function carsSelected() {
        var x = document.getElementById("typeButton");
        var carBtn = document.getElementById("carButton");
        var truckBtn = document.getElementById("truckButton");
        var motorbikeButton = document.getElementById("motorbikeButton");
        var carDiv = document.getElementById("carSelectedDiv");
        var truckDiv = document.getElementById("truckSelectedDiv");
        var motorbikeDiv = document.getElementById("motorbikeSelectedDiv");
        x.value = "Car"
        carBtn.style.border = "thin solid #FFFFFF";
        truckBtn.style.border = "thin solid transparent";
        motorbikeButton.style.border = "thin solid transparent";
        carDiv.style.display = "block"
        truckDiv.style.display = "none"
        motorbikeDiv.style.display = "none"
      }
      function truckSelected() {
        var x = document.getElementById("typeButton");
        x.value = "Truck"
        var truckBtn = document.getElementById("truckButton");
        truckBtn.style.border = "thin solid #FFFFFF";
        var carBtn = document.getElementById("carButton");
        carBtn.style.border = "thin solid transparent";
        var motorbikeButton = document.getElementById("motorbikeButton");
        motorbikeButton.style.border = "thin solid transparent";
        var carDiv = document.getElementById("carSelectedDiv");
        var truckDiv = document.getElementById("truckSelectedDiv");
        var motorbikeDiv = document.getElementById("motorbikeSelectedDiv");
        carDiv.style.display = "none"
        truckDiv.style.display = "block"
        motorbikeDiv.style.display = "none"
      }
      function motorbikeSelected() {
        var x = document.getElementById("typeButton");
        x.value = "Motorbike"
        var motorbikeButton = document.getElementById("motorbikeButton");
        motorbikeButton.style.border = "thin solid #FFFFFF";
        var carBtn = document.getElementById("carButton");
        carBtn.style.border = "thin solid transparent";
        var truckBtn = document.getElementById("truckButton");
        truckBtn.style.border = "thin solid transparent";
        var carDiv = document.getElementById("carSelectedDiv");
        var truckDiv = document.getElementById("truckSelectedDiv");
        var motorbikeDiv = document.getElementById("motorbikeSelectedDiv");
        carDiv.style.display = "none"
        truckDiv.style.display = "none"
        motorbikeDiv.style.display = "block"
      }
    </script>
</x-app-layout>
