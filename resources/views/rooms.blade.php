@extends('layouts.app')

@section('content')
    <div class="container mx-auto mb-5">
        <div id="dorm" class="m-5 pt-5">
            <p class="text-4xl font-semibold text-gray-500">Dorm Rooms</p>
            <div class="mt-5 flex gap-2">
                <a id="allBtn" href="/rooms" class="px-4 py-2 bg-teal-500 rounded-full text-white">All</a>
                <a id="putraBtn"
                    @if (request('location')) href="/rooms?cat=Putra&location={{ request('location') }}"
                    @else href="/rooms?cat=Putra" @endif
                    class="px-4 py-2 bg-orange-300 rounded-full text-white">Putra</a>
                <a id="putriBtn"
                    @if (request('location')) href="/rooms?cat=Putri&location={{ request('location') }}"
                    @else href="/rooms?cat=Putri" @endif
                    class="px-4 py-2 bg-teal-500 rounded-full text-white">Putri</a>
                <div class="hs-dropdown relative inline-flex">
                    <button id="hs-dropdown-default" type="button"
                        class="hs-dropdown-toggle py-2 px-4 inline-flex items-center gap-x-2 text-sm font-medium rounded-full border border-teal-500 bg-white text-gray-800 shadow-sm hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-white dark:hover:bg-neutral-800">
                        Locations
                        <svg class="hs-dropdown-open:rotate-180 size-4" xmlns="http://www.w3.org/2000/svg" width="24"
                            height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path d="m6 9 6 6 6-6" />
                        </svg>
                    </button>

                    <div class="z-40 hs-dropdown-menu transition-[opacity,margin] duration hs-dropdown-open:opacity-100 opacity-0 hidden min-w-60 bg-white shadow-md rounded-lg p-2 mt-2 dark:bg-neutral-800 dark:border dark:border-neutral-700 dark:divide-neutral-700 after:h-4 after:absolute after:-bottom-4 after:start-0 after:w-full before:h-4 before:absolute before:-top-4 before:start-0 before:w-full"
                        aria-labelledby="hs-dropdown-default">
                        <a class="flex items-center gap-x-3.5 py-2 px-3 rounded-lg text-sm text-gray-800 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 dark:text-neutral-400 dark:hover:bg-neutral-700 dark:hover:text-neutral-300 dark:focus:bg-neutral-700"
                            href="/rooms">
                            All
                        </a>
                        @foreach ($locations as $location)
                            <a class="flex items-center gap-x-3.5 py-2 px-3 rounded-lg text-sm text-gray-800 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 dark:text-neutral-400 dark:hover:bg-neutral-700 dark:hover:text-neutral-300 dark:focus:bg-neutral-700"
                                @if (request('cat')) href="/rooms?cat={{ request('cat') }}&location={{ $location->nama }}" @else href="/rooms?location={{ $location->nama }}" @endif>
                                {{ $location->nama }}
                            </a>
                        @endforeach


                    </div>
                </div>
            </div>

        </div>
        {{-- <form class="flex w-full m-5 pt-2" role="search" method="GET">
            <input class="form-control border-2 w-56 border-orange-300 rounded-full p-2 md:w-1/2" id="search"
                type="search" placeholder="Search" aria-label="Search">
            <button class="btn bg-teal-500 text-white font-bold rounded-full py-2 px-6 ml-2 hover:bg-teal-600"
                type="submit">Search</button>
        </form> --}}

        <div id="kamar" class="mx-5 pt-6 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-4 gap-6">

            @if ($rooms != null)
                @foreach ($rooms as $room)
                    <a href="/room/{{ $room->id }}"
                        class="relative card transition-transform transform hover:scale-105 bg-white shadow-md shadow-teal-300/30 rounded-lg ">

                        <span
                            class="absolute top-0 end-4 inline-flex items-center py-2 px-4 rounded-full text-xs font-medium transform -translate-y-1/2 translate-x-1/2 bg-teal-500 text-white">{{ $room->dorms->jenis }}</span>
                        <img src="/storage/rooms/{{ $room->roomImages[0]->image }}"
                            class="card-img-top h-52 w-full object-cover rounded-t-lg" alt="...">
                        <div class="p-4">

                            <p class="card-title font-semibold text-lg">{{ $room->name }}</p>
                            <p class="card-title  text-teal-600 text-lg font-bold">{{ $room->dorms->nama }}</p>

                            <hr>
                            <p class="card-text text-gray-600">{{ $room->deskripsi }}</p>

                            <p class="card-price font-semibold text-lg text-gray-700">
                                {{ $room->dorms->locations[0]->nama }}
                            </p>

                            <p
                                class="card-title mt-3 px-4 py-2 bg-teal-500 rounded-full text-center font-semibold text-white text-lg">

                                {{ number_format($room->harga) }} / month
                            </p>
                        </div>
                    </a>
                @endforeach
            @else
                Data not found
            @endif



        </div>
        <div class="px-5 mt-4">
            {{ $rooms->links() }}

        </div>

        {{-- <div class="more mx-5 my-6">
            <div class="flex justify-end">
                <a class="text-gray-700 hover:text-gray-900 flex items-center space-x-2" href="#">
                    <span>More</span>
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        class="bi bi-arrow-right" viewBox="0 0 16 16">
                        <path fill-rule="evenodd"
                            d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8" />
                    </svg>
                </a>
            </div>
        </div> --}}
    </div>
    <footer class="bg-teal-500 text-white py-20 text-center">
        <a href="" class="text-decoration-none text-white hover:text-teal-100">Contact Us</a>
    </footer>

    {{-- <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
        crossorigin="anonymous"></script>

    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $(document).ready(function() {
            $('#search').on('keyup', function() {
                let query = $(this).val();
                if (query.length > 0) {
                    $.ajax({
                        url: `/rooms/search/${query}`,
                        type: 'GET',
                        success: function(data) {
                            console.log(data);
                            $('#kamar').empty();
                            if (data.length > 0) {
                                data.forEach(function(room) {
                                    let roomImage = room.room_images && room.room_images
                                        .length > 0 ? room.room_images[0].image : '';
                                    $('#kamar').append(`
                                            <a href="/room/${room.id}" class="card transition-transform transform hover:scale-105 bg-white shadow-md rounded-lg overflow-hidden">
                                                <img src="/storage/rooms/${roomImage}" class="card-img-top h-52 w-full object-cover" alt="...">
                                                <div class="p-4">
                                                    <p class="card-title font-semibold text-lg">${room.name}</p>
                                                    <p class="card-title font-normal text-slate-600 text-lg">${room.dorms.nama}</p>
                                                    <p class="card-text text-gray-600">${room.deskripsi}</p>
                                                    <p class="card-price font-semibold text-gray-700">${room.harga} / month</p>
                                                </div>
                                            </a>
                                        `);
                                });
                            } else {
                                $('#kamar').append(
                                    `<h1 class="text-4xl text-center">Data Not Found</h1>`);
                            }
                        }
                    });
                }
            });

            $('#putraBtn').on('click', function() {
                $.ajax({
                    url: '/rooms/gender/putra',
                    type: 'GET',
                    success: function(data) {
                        $('#kamar').empty();
                        console.log(data);
                        if (data.length > 0) {
                            data.forEach(function(room) {
                                let roomImage = room.room_images && room.room_images
                                    .length > 0 ? room.room_images[0].image : '';
                                $('#kamar').append(`
                                        <a href="/room/${room.id}" class="card transition-transform transform hover:scale-105 bg-white shadow-md rounded-lg overflow-hidden">
                                            <img src="/storage/rooms/${roomImage}" class="card-img-top h-52 w-full object-cover" alt="...">
                                            <div class="p-4">
                                                <p class="card-title font-semibold text-lg">${room.name}</p>
                                                <p class="card-title font-normal text-slate-600 text-lg">${room.dorms.nama}</p>
                                                <p class="card-text text-gray-600">${room.deskripsi}</p>
                                                <p class="card-price font-semibold text-gray-700">${room.harga} / month</p>
                                            </div>
                                        </a>
                                    `);
                            });
                        } else {
                            $('#kamar').append(
                                `<h1 class="text-4xl text-center">Data Not Found</h1>`);
                        }
                    }
                });
            });

            $('#putriBtn').on('click', function() {
                $.ajax({
                    url: '/rooms/gender/putri',
                    type: 'GET',
                    success: function(data) {
                        $('#kamar').empty();
                        if (data.length > 0) {
                            data.forEach(function(room) {
                                let roomImage = room.room_images && room.room_images
                                    .length > 0 ? room.room_images[0].image : '';
                                $('#kamar').append(`
                                        <a href="/room/${room.id}" class="card transition-transform transform hover:scale-105 bg-white shadow-md rounded-lg overflow-hidden">
                                            <img src="/storage/rooms/${roomImage}" class="card-img-top h-52 w-full object-cover" alt="...">
                                            <div class="p-4">
                                                <p class="card-title font-semibold text-lg">${room.name}</p>
                                                <p class="card-title font-normal text-slate-600 text-lg">${room.dorms.nama}</p>
                                                <p class="card-text text-gray-600">${room.deskripsi}</p>
                                                <p class="card-price font-semibold text-gray-700">${room.harga} / month</p>
                                            </div>
                                        </a>
                                    `);
                            });
                        } else {
                            $('#kamar').append(
                                `<h1 class="text-4xl text-center">Data Not Found</h1>`);
                        }
                    }
                });
            });
        });
    </script> --}}
@endsection
