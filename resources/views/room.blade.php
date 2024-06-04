@extends('layouts.app')

@section('content')
    <div class="grid grid-cols-2 gap-3 mx-auto p-4 max-w-7xl mt-6">
        <div class="row-span-2 max-h-[50vh]">
            <img src="/storage/rooms/{{ $room->roomImages[0]->image }}"
                class="w-full h-full object-cover rounded-3xl shadow-lg" alt="...">
        </div>
        <div class="max-h-[25vh]">
            <img src="/storage/rooms/{{ $room->roomImages[1]->image }}"
                class="w-full h-full object-cover rounded-3xl shadow-lg" alt="...">
        </div>
        <div class="max-h-[25vh]">
            <img src="/storage/rooms/{{ $room->roomImages[2]->image }}"
                class="w-full h-full object-cover rounded-3xl shadow-lg" alt="...">
        </div>
    </div>
    <div class="flex justify-end mt-4 mr-20">
        <a href="#" class="flex items-center text-teal-500 hover:text-teal-600">
            More
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                class="bi bi-arrow-right ml-2" viewBox="0 0 16 16">
                <path fill-rule="evenodd"
                    d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8" />
            </svg>
        </a>
    </div>

    <div class="container mx-auto mt-8 px-4 w-full">
        <div class="flex  md:flex-row w-full">
            <div class="md:w-2/3 flex flex-col justify-center w-1/2">
                <p class="text-3xl font-semibold text-gray-500 situration">{{ $room->name }}</p>
            </div>
            <div class="md:w-1/3 flex mt-4 md:mt-0  justify-center align-middle content-center w-1/2">
                <p class="text-3xl font-semibold text-gray-400">Rp.{{ number_format($room->harga) }} / month</p>
            </div>
        </div>
    </div>

    <div class="container mx-auto mt-8 px-4">
        <div class="flex flex-col md:flex-row">
            <div class="md:w-2/3 flex ">
                <button type="button"
                    class="mt-1 px-4 py-3 block sm:w-1/2 lg:w-1/4 border-2 bg-teal-500 text-white font-bold rounded-full hover:scale-105 transition-transform">Kost
                    {{ $room->dorms->jenis }}</button>
                <button type="button"
                    class="mt-1 px-4 py-3 block sm:w-1/2 lg:w-1/4 border-2 border-teal-500 text-teal-500 font-bold rounded-full hover:scale-105 transition-transform">Type
                    {{ $room->tipe }}</button>
            </div>
            <div class="md:w-1/3 flex justify-end mt-4 md:mt-0 gap-4">
                <button type="submit"
                    class="mt-1 px-4 py-3 block w-1/2 border-2 border-orange-300 text-teal-500 font-bold rounded-full hover:scale-105 transition-transform">Day
                    of Start</button>
                <button type="submit"
                    class="mt-1 px-4 py-3 block w-1/2 border-2 border-teal-400 text-orange-300 font-bold rounded-full hover:scale-105 transition-transform">How
                    Long</button>
            </div>
        </div>
    </div>

    <div class="container mx-auto mt-8 px-4">
        <div class="flex flex-col md:flex-row">
            <div class="md:w-2/3 flex flex-col ">
                <p class="">{{ $room->deskripsi }}</p>
            </div>
            <div class="md:w-1/3 flex flex-col justify-end mt-4 md:mt-0 gap-4">
                <a href="/booking/{{ $room->id }}"
                    class="mt-1 px-4 py-3 w-full text-center bg-teal-400 text-white font-bold rounded-full hover:scale-105 transition-transform">Book
                    Now</a>
                <button type="submit"
                    class="mt-1 px-4 py-3 block w-full  bg-orange-300 text-white font-bold rounded-full hover:scale-105 transition-transform">Ask
                    Owner</button>
            </div>
        </div>
    </div>
    <br>
    <div class="gap-2 mx-auto p-2 max-w-xs h-20 flex justify-center">
        @foreach ($room->facilities as $facility)
            <div class="col-span-1 relative">
                <img src="/storage/facilities/{{ $facility->image }}" class="w-full h-full object-cover rounded-lg"
                    alt="...">
                <div class="absolute inset-0 bg-black bg-opacity-20 flex items-center justify-center rounded-lg">
                    <span class="text-white font-semibold">{{ $facility->nama }}</span>
                </div>
            </div>
        @endforeach
    </div>
    <br>
    <hr>
    </hr>
    <div class="container mx-auto px-4 mt-8">
        <h2 class="text-2xl font-bold text-teal-500 mb-6">RECOMENDATION</h2>
        <div class="grid grid-cols-2 gap-4 lg:grid-cols-4">
            <div
                class="w-full md:full bg-white shadow-md rounded-lg overflow-hidden transform transition-transform hover:scale-105">
                <img src="/storage/gambar/kos1.jpeg" class="w-full h-40 object-cover" alt="...">
                <div class="p-4">
                    <h5 class="font-semibold">Judul Kamar</h5>
                    <p class="text-gray-600">Some quick example text to build on the card title and make up the bulk of the
                        card's content.</p>
                </div>
                <div class="border-t p-4">
                    <span class="font-semibold">1.500.000 / month</span>
                </div>
            </div>
            <div
                class="w-full md:w-full bg-white shadow-md rounded-lg overflow-hidden transform transition-transform hover:scale-105">
                <img src="/storage/gambar/kos1.jpeg" class="w-full h-40 object-cover" alt="...">
                <div class="p-4">
                    <h5 class="font-semibold">Judul Kamar</h5>
                    <p class="text-gray-600">Some quick example text to build on the card title and make up the bulk of the
                        card's content.</p>
                </div>
                <div class="border-t p-4">
                    <span class="font-semibold">1.500.000 / month</span>
                </div>
            </div>
            <div
                class="w-full md:w-full bg-white shadow-md rounded-lg overflow-hidden transform transition-transform hover:scale-105">
                <img src="/storage/gambar/kos1.jpeg" class="w-full h-40 object-cover" alt="...">
                <div class="p-4">
                    <h5 class="font-semibold">Judul Kamar</h5>
                    <p class="text-gray-600">Some quick example text to build on the card title and make up the bulk of the
                        card's content.</p>
                </div>
                <div class="border-t p-4">
                    <span class="font-semibold">1.500.000 / month</span>
                </div>
            </div>
            <div
                class="w-full md:w-full bg-white shadow-md rounded-lg overflow-hidden transform transition-transform hover:scale-105">
                <img src="/storage/gambar/kos1.jpeg" class="w-full h-40 object-cover" alt="...">
                <div class="p-4">
                    <h5 class="font-semibold">Judul Kamar</h5>
                    <p class="text-gray-600">Some quick example text to build on the card title and make up the bulk of the
                        card's content.</p>
                </div>
                <div class="border-t p-4">
                    <span class="font-semibold">1.500.000 / month</span>
                </div>
            </div>
        </div>
        <div class="flex justify-end mt-6">
            <a href="#" class="flex items-center text-teal-500 hover:text-teal-600">
                More
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                    class="bi bi-arrow-right ml-2" viewBox="0 0 16 16">
                    <path fill-rule="evenodd"
                        d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8" />
                </svg>
            </a>
        </div>
    </div>
@endsection
