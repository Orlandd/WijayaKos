@extends('layouts.app')

@section('content')
    <div class="m-4 flex-grow md:m-10 flex flex-col items-center justify-center px-6 py-5 bg-white">
        <div id="profile" class="w-full">
            <div class="flex flex-col ">
                {{-- <div class="relative w-full">
                    <img src="/storage/img/banner.jpg" alt="Banner" class="w-full h-32 object-cover">
                    <div class="absolute bottom-0 left-1/2 transform -translate-x-1/2 translate-y-1/2">
                        <img src="/storage/img/profile.jpeg" alt="Profile"
                            class="w-20 h-20 md:w-32 md:h-32 object-cover rounded-full border-4 border-white">
                    </div>
                </div> --}}

                <div class=" shadow-lg shadow-teal-300/40 p-4 rounded-xl w-full">
                    <h2 class="text-2xl font-semibold">{{ Auth::user()->name }}</h2>
                    <p class="text-gray-600">{{ Auth::user()->email }}</p>
                    <p class="text-gray-600">{{ Auth::user()->nohp }}</p>
                    <a href="/profile/edit" class="pb-4 transition-transform hover:scale-105"><button
                            class="bg-teal-500 text-white font-semibold py-2 px-6 rounded-full mt-3">Edit
                            Profile</button></a>
                </div>

            </div>
        </div>

        <div id="history" class="m-5 md:m-10 flex-grow">
            <div id="kamar" class="mx-5  grid grid-cols-1 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-4 gap-6">

                @foreach ($bookings as $booking)
                    <div class="card bg-white transition-transform hover:scale-105 shadow-md rounded-lg overflow-hidden">
                        <img src="/storage/img/kamar.jpg" class="card-img-top h-52 w-full object-cover" alt="...">
                        <div class="p-4">
                            <p class="card-title font-semibold text-lg">{{ $booking->rooms->name }}</p>
                            <p class="card-title font-normal text-lg">{{ $booking->rooms->dorms->lokasi }}</p>
                            <hr class="my-3">
                            <p class="card-text text-gray-600">{{ $booking->mulai }} - {{ $booking->akhir }}</p>
                            <p class="card-text text-gray-600">Status : {{ $booking->status }}</p>
                            <hr class="my-3">
                            <p class="card-price font-semibold text-gray-700">Rp
                                {{ number_format($booking->rooms->harga) }},00 / month</p>
                        </div>
                    </div>
                @endforeach

                {{-- 
                <div class="card bg-white transition-transform hover:scale-105 shadow-md rounded-lg overflow-hidden">
                    <img src="/storage/img/kamar.jpg" class="card-img-top h-52 w-full object-cover" alt="...">
                    <div class="p-4">
                        <p class="card-title font-semibold text-lg">Judul Kamar</p>
                        <p class="card-text text-gray-600">Some quick example text to build on the card title and make up
                            the bulk of the card's content.</p>
                        <p class="card-price font-semibold text-gray-700">1.500.000 / month</p>
                    </div>
                </div> --}}
                {{-- <div class="card bg-white transition-transform hover:scale-105 shadow-md rounded-lg overflow-hidden">
                    <img src="/storage/img/kamar.jpg" class="card-img-top h-52 w-full object-cover" alt="...">
                    <div class="p-4">
                        <p class="card-title font-semibold text-lg">Judul Kamar</p>
                        <p class="card-text text-gray-600">Some quick example text to build on the card title and make up
                            the bulk of the card's content.</p>
                        <p class="card-price font-semibold text-gray-700">1.500.000 / month</p>
                    </div>
                </div>
                <div class="card bg-white transition-transform hover:scale-105 shadow-md rounded-lg overflow-hidden">
                    <img src="/storage/img/kamar.jpg" class="card-img-top h-52 w-full object-cover" alt="...">
                    <div class="p-4">
                        <p class="card-title font-semibold text-lg">Judul Kamar</p>
                        <p class="card-text text-gray-600">Some quick example text to build on the card title and make up
                            the bulk of the card's content.</p>
                        <p class="card-price font-semibold text-gray-700">1.500.000 / month</p>
                    </div>
                </div> --}}
            </div>
        </div>

        <hr class="border-2 w-full">
        <h1 class="text-3xl font-medium mt-3">My Room</h1>

        <div id="rooms" class="m-5 md:m-10 ">
            <div id="room" class="mx-5  grid grid-cols-1 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-4 gap-6">

                @foreach ($bookingApprove as $approve)
                    <div class="card  bg-white transition-transform hover:scale-105 shadow-md rounded-lg overflow-hidden">
                        <img src="/storage/img/kamar.jpg" class="card-img-top h-52 w-full object-cover" alt="...">
                        <div class="p-4">
                            <p class="card-title font-semibold text-lg">{{ $approve->rooms->name }}</p>
                            <p class="card-title font-normal text-lg">{{ $approve->rooms->dorms->nama }}</p>
                            <p class="card-title font-normal text-lg">{{ $approve->rooms->dorms->lokasi }}</p>
                            <hr class="my-3">
                            <p class="card-text text-gray-600">End : {{ $approve->akhir }}</p>
                            <hr class="my-3">
                            <p class="card-price font-semibold text-gray-700">Rp
                                {{ number_format($approve->rooms->harga) }},00 / month</p>
                            <br>
                            <a href="/profile/extend/{{ $approve->rooms->id }}"
                                class="bg-teal-500 text-white font-semibold py-2 px-6 rounded-full mt-3">Extend</a>
                        </div>
                    </div>
                @endforeach
                {{-- <div class="card bg-white transition-transform hover:scale-105 shadow-md rounded-lg overflow-hidden">
                    <img src="/storage/img/kamar.jpg" class="card-img-top h-52 w-full object-cover" alt="...">
                    <div class="p-4">
                        <p class="card-title font-semibold text-lg">Judul Kamar</p>
                        <p class="card-text text-gray-600">Some quick example text to build on the card title and make up
                            the bulk of the card's content.</p>
                        <p class="card-price font-semibold text-gray-700">1.500.000 / month</p>
                    </div>
                </div> --}}
            </div>
        @endsection
