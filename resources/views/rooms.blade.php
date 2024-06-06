@extends('layouts.app')

@section('content')
    <div class="container mx-auto">
        <div id="dorm" class="m-5 pt-5">
            <p class="text-4xl font-semibold text-gray-500">Dorm Rooms</p>
            <a href=""><button
                    class="bg-yellow-500 transition-transform transform hover:scale-105 hover:bg-yellow-600 text-white font-bold py-2 px-6 rounded-full mt-3 mr-2">Putra</button></a>
            <a href=""><button
                    class="bg-teal-500 transition-transform transform hover:scale-105 hover:bg-teal-600 text-white font-bold py-2 px-6 rounded-full mt-3">Putri</button></a>
        </div>
        <form class="flex wfull m-5 pt-2" role="search" method="GET">
            <input class="form-control border-2 w-56 border-orange-300 rounded-full p-2 md:w-1/2 " id="search"
                type="search" placeholder="Search" {{-- aria-label="Search"> --}}>
            <button class="btn bg-teal-500 text-white font-bold rounded-full py-2 px-6 ml-2 hover:bg-teal-600"
                type="submit">Search</button>
        </form>

        <div id="kamar" class="mx-5 pt-6 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-4 gap-6">
            @foreach ($rooms as $room)
                <a href="/room/{{ $room->id }}"
                    class="card transition-transform transform hover:scale-105 bg-white shadow-md rounded-lg overflow-hidden">
                    <img src="/storage/rooms/{{ $room->roomImages[0]->image }}"
                        class="card-img-top h-52 w-full object-cover" alt="...">
                    <div class="p-4">
                        <p class="card-title font-semibold text-lg">{{ $room->name }}</p>
                        <p class="card-title font-normal text-slate-600 text-lg">{{ $room->dorms->nama }}</p>
                        <p class="card-text text-gray-600">{{ $room->deskripsi }}</p>
                        <p class="card-price font-semibold text-gray-700">{{ number_format($room->harga) }} / month</p>
                    </div>
                </a>
            @endforeach


            <a href="/room"
                class="card transition-transform transform hover:scale-105 bg-white shadow-md rounded-lg overflow-hidden">
                <img src="/storage/img/kamar.jpg" class="card-img-top h-52 w-full object-cover" alt="...">
                <div class="p-4">
                    <p class="card-title font-semibold text-lg">Judul Kamar</p>
                    <p class="card-text text-gray-600">Some quick example text to build on the card title and make up the
                        bulk
                        of the card's content.</p>
                    <p class="card-price font-semibold text-gray-700">1.500.000 / month</p>
                </div>
            </a>

            <a href="/room"
                class="card transition-transform transform hover:scale-105 bg-white shadow-md rounded-lg overflow-hidden">
                <img src="/storage/img/kamar.jpg" class="card-img-top h-52 w-full object-cover" alt="...">
                <div class="p-4">
                    <p class="card-title font-semibold text-lg">Judul Kamar</p>
                    <p class="card-text text-gray-600">Some quick example text to build on the card title and make up the
                        bulk
                        of the card's content.</p>
                    <p class="card-price font-semibold text-gray-700">1.500.000 / month</p>
                </div>
            </a>

            <a href="/room"
                class="card transition-transform transform hover:scale-105 bg-white shadow-md rounded-lg overflow-hidden">
                <img src="/storage/img/kamar.jpg" class="card-img-top h-52 w-full object-cover" alt="...">
                <div class="p-4">
                    <p class="card-title font-semibold text-lg">Judul Kamar</p>
                    <p class="card-text text-gray-600">Some quick example text to build on the card title and make up the
                        bulk
                        of the card's content.</p>
                    <p class="card-price font-semibold text-gray-700">1.500.000 / month</p>
                </div>
            </a>

            <a href="/room"
                class="card transition-transform transform hover:scale-105 bg-white shadow-md rounded-lg overflow-hidden">
                <img src="/storage/img/kamar.jpg" class="card-img-top h-52 w-full object-cover" alt="...">
                <div class="p-4">
                    <p class="card-title font-semibold text-lg">Judul Kamar</p>
                    <p class="card-text text-gray-600">Some quick example text to build on the card title and make up the
                        bulk
                        of the card's content.</p>
                    <p class="card-price font-semibold text-gray-700">1.500.000 / month</p>
                </div>
            </a>

            <a href="/room"
                class="card transition-transform transform hover:scale-105 bg-white shadow-md rounded-lg overflow-hidden">
                <img src="/storage/img/kamar.jpg" class="card-img-top h-52 w-full object-cover" alt="...">
                <div class="p-4">
                    <p class="card-title font-semibold text-lg">Judul Kamar</p>
                    <p class="card-text text-gray-600">Some quick example text to build on the card title and make up the
                        bulk
                        of the card's content.</p>
                    <p class="card-price font-semibold text-gray-700">1.500.000 / month</p>
                </div>
            </a>

            <a href="/room"
                class="card transition-transform transform hover:scale-105 bg-white shadow-md rounded-lg overflow-hidden">
                <img src="/storage/img/kamar.jpg" class="card-img-top h-52 w-full object-cover" alt="...">
                <div class="p-4">
                    <p class="card-title font-semibold text-lg">Judul Kamar</p>
                    <p class="card-text text-gray-600">Some quick example text to build on the card title and make up the
                        bulk
                        of the card's content.</p>
                    <p class="card-price font-semibold text-gray-700">1.500.000 / month</p>
                </div>
            </a>

            <a href="/room"
                class="card transition-transform transform hover:scale-105 bg-white shadow-md rounded-lg overflow-hidden">
                <img src="/storage/img/kamar.jpg" class="card-img-top h-52 w-full object-cover" alt="...">
                <div class="p-4">
                    <p class="card-title font-semibold text-lg">Judul Kamar</p>
                    <p class="card-text text-gray-600">Some quick example text to build on the card title and make up the
                        bulk
                        of the card's content.</p>
                    <p class="card-price font-semibold text-gray-700">1.500.000 / month</p>
                </div>
            </a>
        </div>

        <div class="more mx-5 my-6">
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
        </div>
    </div>
    <footer class="bg-teal-500 text-white py-20  text-center">
        <a href="" class="text-decoration-none text-white hover:text-teal-100">Contact Us</a>
    </footer>

    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
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
                if (query.length > 0) { // Tambahkan pengecekan agar tidak mengirim request kosong
                    $.ajax({
                        url: `/rooms/search/${query}`,
                        type: 'GET',
                        success: function(data) {
                            //console.log(data[0].dorms); // Log data yang diterima dari server
                            $('#kamar').empty();

                            let html = '';
                            if (data.length > 0) {
                                $.each(data, function(index, room) {
                                    let roomImage = room.room_images && room.room_images
                                        .length > 0 ? room.room_images[0].image :
                                        ''; // Sesuaikan dengan nama properti yang diberikan oleh server
                                    $('#kamar').append(`
                                        <a href="/room/${room.id}"
                                            class="card transition-transform transform hover:scale-105 bg-white shadow-md rounded-lg overflow-hidden">
                                            <img src="/storage/rooms/${roomImage}"
                                                class="card-img-top h-52 w-full object-cover" alt="...">
                                            <div class="p-4">
                                                <p class="card-title font-semibold text-lg">${room.name}</p>
                                                <p class="card-title font-normal text-slate-600 text-lg">${room.dorms.nama}</p> <!-- Sesuaikan dengan nama properti yang diberikan oleh server -->
                                                <p class="card-text text-gray-600">${room.deskripsi}</p>
                                                <p class="card-price font-semibold text-gray-700">${room.harga} / month</p>
                                            </div>
                                        </a>
                                    `);
                                });

                            } else {
                                $('#kamar').append(
                                    /*HTML*/
                                    `<h1 class="text-4xl text-center">Data Not Found</h1>`
                                ); // Pesan jika data kosong
                            }
                        }
                    });
                }
            });
        });
    </script>
@endsection
