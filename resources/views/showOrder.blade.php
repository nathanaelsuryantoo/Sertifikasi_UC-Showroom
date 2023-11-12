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
                    <a  class="flex bg-gray-700 p-2 rounded-lg text-white">
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
               <div class="text-2xl font-semibold mb-4">Vehicle List</div>
               <ul class="max-w-md divide-y divide-gray-200 dark:divide-gray-700">
                @foreach ($vehicles as $vehicle)
                <li class="pb-3 sm:pb-4">{{$vehicle->model}} - {{$vehicle->year}}</li>
                @endforeach
               </ul>
               <div class="text-2xl font-semibold mt-6">Amount To Be Paid</div>
               <p>Rp. {{number_format(($vehicles->sum('price')),0,',','.')}}</p>
               <a href="javascript:history.back()" class="mt-12 flex w-24 text-white focus:ring-4 focus:outline-none font-medium rounded-lg text-sm px-5 py-2.5 text-center bg-blue-600 hover:bg-blue-700 focus:ring-blue-800">
                <span class="material-symbols-outlined mr-1">
                    arrow_back
                    </span>
                    <span>Back</span>
                </a>
            </div>
        </div>
    </div>
    
</x-app-layout>
