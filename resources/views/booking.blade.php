@extends('layouts.app')

@section('content')
    <div class="container mx-auto">
        <div class="gap-10 w-full max-w-4xl bg-white rounded-lg p-6 flex flex-col sm:flex-row">
            <div class="card bg-white shadow-md rounded-lg overflow-hidden sm:min-w-60 md:min-w-80">
                <img src="/storage/img/kamar.jpg" class="card-img-top h-52 w-full object-cover" alt="...">
                <div class="p-4">
                    <p class="card-title font-semibold text-lg">Unit Name</p>
                    <p class="card-text text-gray-600">Location</p>
                    <p class="card-text text-gray-600">How long</p>
                    <p class="card-price font-semibold text-gray-700 pt-2">1.500.000 / month</p>
                </div>
            </div>

            <div class="order-1 md:order-2 flex-grow mb-6 md:mb-0">
                <h2 class="text-2xl font-semibold text-gray-700 mb-4">Booking</h2>
                <p class="text-lg text-gray-500 mb-6">Your Data</p>
                <form class="mx-auto">
                    <input type="text" placeholder="Name"
                        class="border-2 border-yellow-500 rounded-full px-4 py-2 w-full mb-4">
                    <input type="text" placeholder="Phone"
                        class="border-2 border-yellow-500 rounded-full px-4 py-2 w-full mb-4">
                    <input type="email" placeholder="Email"
                        class="border-2 border-yellow-500 rounded-full px-4 py-2 w-full mb-4">
                    <input type="text" placeholder="Address"
                        class="border-2 border-yellow-500 rounded-full px-4 py-2 w-full mb-4">
                    <button type="submit"
                        class="bg-teal-500 text-white font-semibold py-2 px-6 rounded-full transition-transform hover:scale-105">Book</button>
                </form>
            </div>
        </div>
    </div>
@endsection
