@extends('layouts.app')

@section('content')
    <div class="container mx-auto">
        <div class="grid grid-cols-1 gap-3">
            <div class="h-[50vh] relative">
                <img src="/storage/gambar/kos1.jpeg" class="w-full h-full object-cover shadow-lg" alt="...">
                <div class="absolute inset-0 bg-black opacity-60"></div>
                <div class="absolute inset-0 flex items-center justify-center">
                    <h5 class="text-white text-[40px] font-bold">LOCATIONS</h5>
                </div>
            </div>
        </div>

        <div class="container mx-auto px-4 mt-8">
            <p class="mb-3 font-semibold text-teal-500 text-[30px]">Location</p>
            <select id="locationSelect"
                class="py-3 px-4 pe-9 lg:w-1/2 block w-full border-2 border-orange-300 rounded-full text-sm bg-white dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600">
                <option value="all" selected>All Locations</option>
                @foreach ($locations as $location)
                    <option value="{{ $location->nama }}">{{ $location->nama }}</option>
                @endforeach
            </select>
        </div>

        <div id="dormsContainer" class="container mx-auto px-4 mt-8 mb-8">
            <div class="grid grid-cols-1 gap-4 md:grid-cols-2">
                @foreach ($dorms as $dorm)
                    <div
                        class="dorm-item bg-white border rounded-xl shadow-sm sm:flex lg:flex dark:shadow-neutral-700/70 mt-5 hover:scale-105 transition-transform">
                        <div
                            class="flex-shrink-0 relative w-full rounded-t-xl overflow-hidden sm:rounded-s-xl sm:max-w-60 md:rounded-se-none md:max-w-xs">
                            <img class="w-full h-full object-cover" src="/storage/dorms/{{ $dorm->images[0]->image }}"
                                alt="Image Description">
                        </div>
                        <div class="flex flex-wrap">
                            <div class="p-4 flex flex-col h-full sm:p-7">
                                <h3 class="text-xl font-bold text-teal-500">{{ $dorm->nama }}</h3>
                                <p class="mt-1 rounded-lg text-white px-4 py-2 bg-teal-500 dark:text-neutral-400">
                                    {{ $dorm->locations[0]->nama }}</p>
                                <p class="mt-1 font-semibold text-lg text-gray-500 dark:text-neutral-400">
                                    {{ $dorm->jenis }}</p>
                                <p class="mt-1 text-gray-500 dark:text-neutral-400">{{ $dorm->deskripsi }}</p>
                                <div class="mt-6 md:mt-auto *:sm:mt-auto">
                                    <p class="text-xs text-teal-500 dark:text-neutral-500">{{ $dorm->lokasi }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

    </div>
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
        crossorigin="anonymous"></script>

    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $(document).ready(function() {
            $('#locationSelect').on('change', function() {
                let locationId = $(this).val();
                $.ajax({
                    url: `/dorms/location/${locationId}`,
                    type: 'GET',
                    success: function(data) {
                        console.log(data);
                        $('#dormsContainer .grid').empty();
                        if (data.length > 0) {
                            data.forEach(function(dorm) {
                                let dormImage = dorm.images && dorm.images.length > 0 ?
                                    dorm.images[0].image : '';
                                $('#dormsContainer .grid').append(`
                                        <div class="dorm-item bg-white border rounded-xl shadow-sm sm:flex lg:flex dark:shadow-neutral-700/70 mt-5 hover:scale-105 transition-transform">
                                            <div class="flex-shrink-0 relative w-full rounded-t-xl overflow-hidden sm:rounded-s-xl sm:max-w-60 md:rounded-se-none md:max-w-xs">
                                                <img class="w-full h-full object-cover" src="/storage/dorms/${dormImage}" alt="Image Description">
                                            </div>
                                            <div class="flex flex-wrap">
                                                <div class="p-4 flex flex-col h-full sm:p-7">
                                                    <h3 class="text-xl font-bold text-teal-500">${dorm.nama}</h3>
                                                    <p class="mt-1 rounded-lg text-white px-4 py-2 bg-teal-500 dark:text-neutral-400">${dorm.locations[0].nama}</p>
                                                    <p class="mt-1 font-semibold text-lg text-gray-500 dark:text-neutral-400">${dorm.jenis}</p>
                                                    <p class="mt-1 text-gray-500 dark:text-neutral-400">${dorm.deskripsi}</p>
                                                    <div class="mt-6 md:mt-auto *:sm:mt-auto">
                                                        <p class="text-xs text-gray-500 dark:text-neutral-500">${dorm.lokasi}</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    `);
                            });
                        } else {
                            $('#dormsContainer .grid').append(
                                `<h1 class="text-4xl text-center">Data Not Found</h1>`);
                        }
                    }
                });
            });
        });
    </script>
@endsection
