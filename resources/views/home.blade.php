@extends('layouts.app')

@section('content')
    <div class="">
        <div class="container mx-auto mt-8 px-4">
            {{-- <div class="flex flex-col md:flex-row">
                <div class="md:w-2/3 flex flex-col justify-center">
                    <h1 class="text-3xl font-bold text-gray-800 situration">Do you want to get a Dorm</h1>
                    <p class="mt-2">Let's search your near location</p>
                    <form class="flex mt-4" role="search">
                        <input class="form-control border-2 border-orange-300 rounded-full p-2 w-1/2" type="search"
                            placeholder="Search" aria-label="Search">
                        <button class="btn bg-teal-500 text-white font-bold rounded-full py-2 px-6 ml-2 hover:bg-teal-600"
                            type="submit">Search</button>
                    </form>
                </div>
                <div class="md:w-1/3 flex justify-end mt-4 md:mt-0">
                    <img src="/storage/gambar/1.png" class="hidden md:block max-w-full md:w-3/4" alt="Dorm Image">
                </div>
            </div> --}}

            <!-- Slider -->
            <div data-hs-carousel='{
    "loadingClasses": "opacity-0",
    "isAutoPlay": true
  }' class="relative">
                <div class="hs-carousel relative overflow-hidden w-full min-h-60 md:min-h-[500px] bg-white rounded-lg">
                    <div
                        class="hs-carousel-body absolute top-0 bottom-0 start-0 flex flex-nowrap transition-transform duration-700 opacity-0">
                        <div class="hs-carousel-slide">
                            <div class="flex  bg-fixed bg-cover justify-center h-full bg-gray-100 p-6 dark:bg-neutral-900"
                                style="background-image: url(/storage/home/gambar1.jpg)">
                                {{-- <span
                                    class="self-center text-4xl text-gray-800 transition duration-700 dark:text-white">First
                                    slide</span> --}}
                            </div>
                        </div>
                        <div class="hs-carousel-slide">
                            <div class="flex  bg-fixed bg-cover justify-center h-full bg-gray-200 p-6 dark:bg-neutral-800"
                                style="background-image: url(/storage/home/gambar2.jpg)">
                                {{-- <span
                                    class="self-center text-4xl text-gray-800 transition duration-700 dark:text-white">Second
                                    slide</span> --}}
                            </div>
                        </div>
                        <div class="hs-carousel-slide">
                            <div class="flex bg-fixed bg-cover justify-center h-full bg-gray-300 p-6 dark:bg-neutral-700"
                                style="background-image: url(/storage/home/gambar3.jpg)">
                                <div class=""></div>
                                {{-- <span
                                    class="self-center text-4xl text-gray-800 transition duration-700 dark:text-white">Third
                                    slide</span> --}}
                            </div>
                        </div>
                    </div>
                </div>

                <button type="button"
                    class="hs-carousel-prev hs-carousel:disabled:opacity-50 disabled:pointer-events-none absolute inset-y-0 start-0 inline-flex justify-center items-center w-[46px] h-full text-gray-800 hover:bg-gray-800/10 rounded-s-lg dark:text-white dark:hover:bg-white/10">
                    <span class="text-2xl" aria-hidden="true">
                        <svg class="flex-shrink-0 size-5" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round">
                            <path d="m15 18-6-6 6-6"></path>
                        </svg>
                    </span>
                    <span class="sr-only">Previous</span>
                </button>
                <button type="button"
                    class="hs-carousel-next hs-carousel:disabled:opacity-50 disabled:pointer-events-none absolute inset-y-0 end-0 inline-flex justify-center items-center w-[46px] h-full text-gray-800 hover:bg-gray-800/10 rounded-e-lg dark:text-white dark:hover:bg-white/10">
                    <span class="sr-only">Next</span>
                    <span class="text-2xl" aria-hidden="true">
                        <svg class="flex-shrink-0 size-5" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round">
                            <path d="m9 18 6-6-6-6"></path>
                        </svg>
                    </span>
                </button>

                <div class="hs-carousel-pagination flex justify-center absolute bottom-3 start-0 end-0 space-x-2">
                    <span
                        class="hs-carousel-active:bg-blue-700 hs-carousel-active:border-blue-700 size-3 border border-gray-400 rounded-full cursor-pointer dark:border-neutral-600 dark:hs-carousel-active:bg-blue-500 dark:hs-carousel-active:border-blue-500"></span>
                    <span
                        class="hs-carousel-active:bg-blue-700 hs-carousel-active:border-blue-700 size-3 border border-gray-400 rounded-full cursor-pointer dark:border-neutral-600 dark:hs-carousel-active:bg-blue-500 dark:hs-carousel-active:border-blue-500"></span>
                    <span
                        class="hs-carousel-active:bg-blue-700 hs-carousel-active:border-blue-700 size-3 border border-gray-400 rounded-full cursor-pointer dark:border-neutral-600 dark:hs-carousel-active:bg-blue-500 dark:hs-carousel-active:border-blue-500"></span>
                </div>
            </div>
            <!-- End Slider -->
        </div>

        <hr class="my-8">
        <div class="container mx-auto px-4">
            <h2 class="text-2xl font-bold text-center text-teal-500 mb-6">FACILITY</h2>
            <div class="flex flex-wrap gap-4 justify-center">
                @foreach ($facilities as $facility)
                    <div
                        class="w-full sm:w-1/2 md:w-1/5 bg-white shadow-md rounded-lg overflow-hidden transform transition-transform hover:scale-105">
                        <img src="/storage/facilities/{{ $facility->image }}" class="w-full h-40 object-cover"
                            alt="Garasi">
                        <div class="text-center p-4">
                            <h5 class="font-semibold">{{ $facility->nama }}</h5>
                        </div>
                    </div>
                @endforeach

                {{-- <div
                    class="w-full sm:w-1/2 md:w-1/5 bg-white shadow-md rounded-lg overflow-hidden transform transition-transform hover:scale-105">
                    <img src="/storage/gambar/kos2.jpeg" class="w-full h-40 object-cover" alt="Bed">
                    <div class="text-center p-4">
                        <h5 class="font-semibold">Bed</h5>
                    </div>
                </div>
                <div
                    class="w-full sm:w-1/2 md:w-1/5 bg-white shadow-md rounded-lg overflow-hidden transform transition-transform hover:scale-105">
                    <img src="/storage/gambar/kos2.jpeg" class="w-full h-40 object-cover" alt="AC">
                    <div class="text-center p-4">
                        <h5 class="font-semibold">AC</h5>
                    </div>
                </div>
                <div
                    class="w-full sm:w-1/2 md:w-1/5 bg-white shadow-md rounded-lg overflow-hidden transform transition-transform hover:scale-105">
                    <img src="/storage/gambar/kos2.jpeg" class="w-full h-40 object-cover" alt="Desk">
                    <div class="text-center p-4">
                        <h5 class="font-semibold">Desk</h5>
                    </div>
                </div> --}}
            </div>
        </div>


        <div class="container mx-auto px-4 mt-8">
            <h2 class="text-2xl font-bold text-teal-500 mb-6">ROOM</h2>
            <div class="grid grid-cols-1 gap-4 lg:grid-cols-4">
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

                            <p class="card-price font-semibold text-lg text-gray-700">{{ $room->dorms->locations[0]->nama }}
                            </p>

                            <p
                                class="card-title mt-3 px-4 py-2 bg-teal-500 rounded-full text-center font-semibold text-white text-lg">

                                {{ number_format($room->harga) }} / month
                            </p>
                        </div>
                    </a>
                @endforeach

                {{-- <div
                    class="w-full md:w-full bg-white shadow-md rounded-lg overflow-hidden transform transition-transform hover:scale-105">
                    <img src="/storage/gambar/kos1.jpeg" class="w-full h-40 object-cover" alt="...">
                    <div class="p-4">
                        <h5 class="font-semibold">Judul Kamar</h5>
                        <p class="text-gray-600">Some quick example text to build on the card title and make up the bulk of
                            the card's content.</p>
                    </div>
                    <div class="border-t p-4">
                        <span class="font-semibold">1.500.000 / month</span>
                    </div>
                </div> --}}
                {{-- <div
                    class="w-full md:w-full bg-white shadow-md rounded-lg overflow-hidden transform transition-transform hover:scale-105">
                    <img src="/storage/gambar/kos1.jpeg" class="w-full h-40 object-cover" alt="...">
                    <div class="p-4">
                        <h5 class="font-semibold">Judul Kamar</h5>
                        <p class="text-gray-600">Some quick example text to build on the card title and make up the bulk of
                            the card's content.</p>
                    </div>
                    <div class="border-t p-4">
                        <span class="font-semibold">1.500.000 / month</span>
                    </div>
                </div> --}}
                {{-- <div
                    class="w-full md:w-full bg-white shadow-md rounded-lg overflow-hidden transform transition-transform hover:scale-105">
                    <img src="/storage/gambar/kos1.jpeg" class="w-full h-40 object-cover" alt="...">
                    <div class="p-4">
                        <h5 class="font-semibold">Judul Kamar</h5>
                        <p class="text-gray-600">Some quick example text to build on the card title and make up the bulk of
                            the card's content.</p>
                    </div>
                    <div class="border-t p-4">
                        <span class="font-semibold">1.500.000 / month</span>
                    </div>
                </div> --}}
            </div>
            <div class="flex justify-end mt-6">
                <a href="/rooms" class="flex items-center text-teal-500 hover:text-teal-600">
                    More
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        class="bi bi-arrow-right ml-2" viewBox="0 0 16 16">
                        <path fill-rule="evenodd"
                            d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8" />
                    </svg>
                </a>
            </div>
        </div>

        <div class="container mx-auto px-4 my-8">
            <h2 class="text-2xl font-bold text-teal-500 mb-6 text-center">FAMOUS LOCATION</h2>
            <div class="flex flex-wrap justify-center gap-8">
                @foreach ($locations as $location)
                    <div
                        class="relative w-[306px] h-[178px] rounded-2xl shadow overflow-hidden transform transition-transform hover:scale-105">
                        <img src="/storage/locations/{{ $location->image }}" class="w-full h-full object-cover rounded-2xl"
                            alt="Jakarta">
                        <div class="absolute inset-0 bg-black bg-opacity-50 flex items-center justify-center">
                            <h5 class="text-white text-[40px] font-bold">{{ $location->nama }}</h5>
                        </div>
                    </div>
                @endforeach

                {{-- <div
                    class="relative w-[306px] h-[178px] rounded-2xl shadow overflow-hidden transform transition-transform hover:scale-105">
                    <img src="/storage/gambar/solo.jpeg" alt="Solo" class="w-full h-full object-cover rounded-2xl">
                    <div class="absolute inset-0 bg-black bg-opacity-50 flex items-center justify-center">
                        <span class="text-white text-[40px] font-bold">SOLO</span>
                    </div>
                </div>
                <div
                    class="relative w-[306px] h-[178px] rounded-2xl shadow overflow-hidden transform transition-transform hover:scale-105">
                    <img src="/storage/gambar/bdg.jpeg" alt="Bandung" class="w-full h-full object-cover rounded-2xl">
                    <div class="absolute inset-0 bg-black bg-opacity-50 flex items-center justify-center">
                        <span class="text-white text-[40px] font-bold">BANDUNG</span>
                    </div>
                </div>
                <div
                    class="relative w-[306px] h-[178px] rounded-2xl shadow overflow-hidden transform transition-transform hover:scale-105">
                    <img src="/storage/gambar/sby.jpeg" alt="Surabaya" class="w-full h-full object-cover rounded-2xl">
                    <div class="absolute inset-0 bg-black bg-opacity-50 flex items-center justify-center">
                        <span class="text-white text-[40px] font-bold">SURABAYA</span>
                    </div>
                </div>
                <div
                    class="relative w-[306px] h-[178px] rounded-2xl shadow overflow-hidden transform transition-transform hover:scale-105">
                    <img src="/storage/gambar/jogja.jpeg" alt="Jogja" class="w-full h-full object-cover rounded-2xl">
                    <div class="absolute inset-0 bg-black bg-opacity-50 flex items-center justify-center">
                        <span class="text-white text-[40px] font-bold">JOGJA</span>
                    </div>
                </div> --}}
            </div>
        </div>
    </div>
    <footer class="bg-teal-500 text-white py-20  text-center">
        <a href="" class="text-decoration-none text-white hover:text-teal-100">Contact Us</a>
    </footer>
@endsection
