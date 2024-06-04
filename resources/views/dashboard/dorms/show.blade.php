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

        <div class="grid grid-cols-1 gap-3 mx-auto p-4 max-w-7xl mt-6">
            <div class="row-span-2 max-h-[50vh]">
                <img src="/storage/dorms/{{ $dorm->images[0]->image }}"
                    class="w-full h-full object-cover rounded-3xl shadow-lg" alt="...">
            </div>

        </div>
        <div class="container mx-auto mt-8 px-4">
            <div class="flex flex-col md:flex-row">
                <div class="md:w-2/3 flex flex-col justify-center">
                    <button type="button"
                        class="mt-1 px-4 py-3 block sm:w-1/2 lg:w-1/4 border-2 bg-teal-500 text-white font-bold rounded-full hover:scale-105 transition-transform">Kost
                        {{ $dorm->jenis }}</button>
                </div>
            </div>
        </div>

        <div class="container mx-auto mt-8 px-4 w-full">
            <div class="flex justify-between">
                <div class="">
                    <p class="text-3xl font-semibold text-gray-500 situration">{{ $dorm->nama }}</p>
                </div>
                <div class="">
                    <p class="text-3xl font-semibold text-gray-400">{{ $dorm->locations[0]->nama }}</p>
                </div>
            </div>

        </div>



        <div class="container mx-auto mt-8 px-4">
            <div class="flex flex-col md:flex-row">
                <div class="md:w-2/3 flex flex-col ">
                    <p class="">{{ $dorm->deskripsi }}</p>
                </div>

            </div>
        </div>
        <br>
    </section>
@endsection
