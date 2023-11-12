<x-app-layout>
    <div class="fixed left-0 py-4 w-64 h-screen top-16">
        <div class="bg-gray-800 overflow-hidden shadow-sm sm:rounded-r-lg py-6 h-full px-3">
            <div class="text-3xl font-semibold text-white ml-2">Dashboard</div>
            <ul class="space-y-2 font-medium mt-6">
                <li>
                    <a href="/vehicle" class="flex hover:bg-gray-700 p-2 rounded-lg text-white">
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
                    <a class="flex bg-gray-700 p-2 rounded-lg text-white">
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
                <form action="{{route('order.update', ['order'=>$order])}}" method="POST" enctype="multipart/form-data" class="p-4 md:p-5" name="editCustomerForm" id="editCustomerForm">
                    @csrf
                    @method("PUT")
                    <div class="grid gap-4 mb-4 grid-cols-2">
                        <div class="col-span-2">
                            <label for="customerID"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Customer Name</label>
                                <input type="text" name="name" id="name"
                                value="{{$order->customer->name}}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                placeholder="Type name" required="" disabled>
                        </div>
                        <div class="col-span-2">
                            <label for="customerID"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select
                                Vehicle</label>
                            @foreach($orderedVehicles as $orderedVehicle)
                            <select id="customerID" name="moreFields[{{$orderedVehicle->id}}]"
                                class="mb-6 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                @foreach ($vehicles as $vehicle)
                                    <option @if ($vehicle->id == $orderedVehicle->vehicles_id) selected @endif value="{{ $vehicle->id }}">{{ $vehicle->model }}</option>
                                @endforeach
                            </select>
                            @endforeach
                        </div>
                    </div>
                    <button type="submit"
                        class="mt-4 text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        <span class="material-symbols-outlined mr-2">
                            edit
                        </span>
                        Edit Order Data
                    </button>
                </form>
            </div>
        </div>
    </div>
    
</x-app-layout>
