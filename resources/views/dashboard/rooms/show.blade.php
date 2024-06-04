@extends('dashboard.layouts.main')

@section('container')
    @if (session('status'))
        <section class="container ">
            <div class="w-full p-3 border-2 border-sky-600 rounded-lg shadow-lg shadow-sky-300">
                {{ session('status') }}
            </div>
        </section>
    @endif


    <section class="container px-3">

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
            </div>
        </div>

        <div class="container mx-auto mt-8 px-4">
            <div class="flex flex-col md:flex-row">
                <div class="md:w-3/3 flex flex-col ">
                    <p class="">{{ $room->deskripsi }}</p>
                </div>

            </div>
        </div>
        <br>
        <div class="gap-2 mx-auto p-2 max-w-xs h-20 flex justify-center">
            @foreach ($room->facilities as $facility)
                <div class="col-span-1">
                    <img src="/storage/facilities/{{ $facility->image }}" class="w-full h-full object-cover rounded-lg"
                        alt="...">
                </div>
            @endforeach
        </div>
        <br>

    </section>
@endsection
