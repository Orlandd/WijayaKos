@extends('layouts.app')

@section('content')
    <div class="container mx-auto">
        <div class="grid grid-cols-1 gap-3">
            <div class="h-[50vh] relative">
                <img src="/storage/gambar/kos1.jpeg" class="w-full h-full object-cover shadow-lg" alt="...">
                <div class="absolute inset-0 bg-black opacity-60"></div>
                <div class="absolute inset-0 flex items-center justify-center">
                    <h5 class="text-white text-[40px] font-bold">LOCATION</h5>
                    <p class="text-white text-[40px] font-normal">dorm</p>
                </div>
            </div>
        </div>

        <div class="container mx-auto px-4 mt-8">
            <p class="mb-3 font-semibold text-teal-500 text-[30px]">Location</p>
            <select
                class="py-3 px-4 pe-9 lg:w-1/2 block w-full border-2 border-orange-300 rounded-full text-sm bg-white dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600">
                <option selected="">Open this select location</option>
                <option>Solo</option>
                <option>Jakarta</option>
                <option>Jogja</option>
                <option>Bandung</option>
                <option>Surabaya</option>
                <option>Bogor</option>
                <option>Semarang</option>
            </select>
        </div>

        <div class="container mx-auto px-4 mt-8">
            <div
                class="bg-white border rounded-xl shadow-sm sm:flex lg:flex dark:shadow-neutral-700/70 mt-5 hover:scale-105 transition-transform">
                <div
                    class="flex-shrink-0 relative w-full rounded-t-xl overflow-hidden sm:rounded-s-xl sm:max-w-60 md:rounded-se-none md:max-w-xs">
                    <img class="w-full h-full object-cover"
                        src="https://images.unsplash.com/photo-1680868543815-b8666dba60f7?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=2532&q=80"
                        alt="Image Description">
                </div>
                <div class="flex flex-wrap">
                    <div class="p-4 flex flex-col h-full sm:p-7">
                        <h3 class="text-lg font-bold text-teal-500">
                            Kost Mawar
                        </h3>
                        <p class="mt-1 text-gray-500 dark:text-neutral-400">
                            Some quick example text to build on the card title and make up the bulk of the card's content.
                        </p>
                        <div class="mt-6 md:mt-auto *:sm:mt-auto">
                            <p class="text-xs text-gray-500 dark:text-neutral-500">
                                Jl. Kartika, Jebres, Surakarta
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div
                class="bg-white border rounded-xl shadow-sm sm:flex lg:flex dark:shadow-neutral-700/70 mt-5 hover:scale-105 transition-transform">
                <div
                    class="flex-shrink-0 relative w-full rounded-t-xl overflow-hidden sm:rounded-s-xl sm:max-w-60 md:rounded-se-none md:max-w-xs">
                    <img class="w-full h-full object-cover"
                        src="https://images.unsplash.com/photo-1680868543815-b8666dba60f7?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=2532&q=80"
                        alt="Image Description">
                </div>
                <div class="flex flex-wrap">
                    <div class="p-4 flex flex-col h-full sm:p-7">
                        <h3 class="text-lg font-bold text-teal-500">
                            Kost Mawar
                        </h3>
                        <p class="mt-1 text-gray-500 dark:text-neutral-400">
                            Some quick example text to build on the card title and make up the bulk of the card's content.
                        </p>
                        <div class="mt-6 md:mt-auto *:sm:mt-auto">
                            <p class="text-xs text-gray-500 dark:text-neutral-500">
                                Jl. Kartika, Jebres, Surakarta
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div
                class="bg-white border rounded-xl shadow-sm sm:flex lg:flex dark:shadow-neutral-700/70 mt-5 hover:scale-105 transition-transform">
                <div
                    class="flex-shrink-0 relative w-full rounded-t-xl overflow-hidden sm:rounded-s-xl sm:max-w-60 md:rounded-se-none md:max-w-xs">
                    <img class="w-full h-full object-cover"
                        src="https://images.unsplash.com/photo-1680868543815-b8666dba60f7?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=2532&q=80"
                        alt="Image Description">
                </div>
                <div class="flex flex-wrap">
                    <div class="p-4 flex flex-col h-full sm:p-7">
                        <h3 class="text-lg font-bold text-teal-500">
                            Kost Mawar
                        </h3>
                        <p class="mt-1 text-gray-500 dark:text-neutral-400">
                            Some quick example text to build on the card title and make up the bulk of the card's content.
                        </p>
                        <div class="mt-6 md:mt-auto *:sm:mt-auto">
                            <p class="text-xs text-gray-500 dark:text-neutral-500">
                                Jl. Kartika, Jebres, Surakarta
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div
                class="bg-white border rounded-xl shadow-sm sm:flex lg:flex dark:shadow-neutral-700/70 mt-5 hover:scale-105 transition-transform">
                <div
                    class="flex-shrink-0 relative w-full rounded-t-xl overflow-hidden sm:rounded-s-xl sm:max-w-60 md:rounded-se-none md:max-w-xs">
                    <img class="w-full h-full object-cover"
                        src="https://images.unsplash.com/photo-1680868543815-b8666dba60f7?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=2532&q=80"
                        alt="Image Description">
                </div>
                <div class="flex flex-wrap">
                    <div class="p-4 flex flex-col h-full sm:p-7">
                        <h3 class="text-lg font-bold text-teal-500">
                            Kost Mawar
                        </h3>
                        <p class="mt-1 text-gray-500 dark:text-neutral-400">
                            Some quick example text to build on the card title and make up the bulk of the card's content.
                        </p>
                        <div class="mt-6 md:mt-auto *:sm:mt-auto">
                            <p class="text-xs text-gray-500 dark:text-neutral-500">
                                Jl. Kartika, Jebres, Surakarta
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
