@extends('dashboard.layouts.main')

@section('container')
    {{-- Place  --}}

    <section class="container px-3 mb-6">
        <h3 class="text-3xl font-bold ">Add Rooms</h3>
    </section>

    @if (session('status'))
        <section class="container ">
            <div class="w-full p-3 border-2 border-sky-600 rounded-lg shadow-lg shadow-sky-300">
                {{ session('status') }}
            </div>
        </section>
    @endif


    <section class="container mx-auto px-3">
        <form action="/dashboard/rooms/" method="post" enctype="multipart/form-data">
            @csrf
            <label for="nama">Name</label><br>
            <input type="text" name="nama" id="nama"
                class="w-full rounded-lg py-2 px-3 mb-3 border-gray-200 border-2"><br>
            <label for="jenis">Type</label>
            <select id="jenis" name="jenis"
                class="w-full py-2 px-3 mb-3 pe-9 block  border-2 border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600">

                <option selected="standart" value="Standart">Standart
                </option>

                <option selected="premium" value="Premium">Premium
                </option>

                <option selected="vip" value="VIP">VIP
                </option>

            </select>
            <label for="kost">Kost</label>
            <select id="kost" name="kost"
                class="w-full py-2 px-3 mb-3 pe-9 block border-2 border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600">
                @foreach ($dorms as $dorm)
                    <option selected="{{ $dorm['nama'] }}" value="{{ $dorm['id'] }}">{{ $dorm['nama'] }}
                    </option>
                @endforeach

            </select>
            <label for="harga">Price</label><br>
            <input type="number" min="0" name="harga" id="harga"
                class="w-full rounded-lg py-2 px-3 mb-3 border-gray-200 border-2"><br>

            <label for="deskripsi">Description</label><br>
            <input type="text" name="deskripsi" id="deskripsi"
                class="w-full rounded-lg py-2 px-3 mb-3 border-gray-200 border-2"><br>
            <br>
            <hr>
            <br>
            <label for="facility">Facility</label><br><br>
            <button type="button" class="py-2 px-3 rounded-lg border-2 border-cyan-500" id="add">Add
                Facility</button>
            <button type="button" class="py-2 px-3 rounded-lg border-2 border-cyan-500" id="remove">Remove
                Facility</button><br><br>

            <div class="" id="facilities">

                <select id="facility" name="facility[]"
                    class="w-full py-2 px-3 mb-3 pe-9 block border-2 border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600">
                    @foreach ($facilities as $facility)
                        <option selected="{{ $facility['nama'] }}" value="{{ $facility['id'] }}">{{ $facility['nama'] }}
                        </option>
                    @endforeach
                </select>

            </div>


            <br>
            <hr>
            <br>


            <label for="image1">Image 1</label><br>
            <input type="file" name="image1" id="image1"
                class="w-full rounded-lg py-2 px-3 mb-3 border-gray-200 border-2"><br>
            <label for="image2">Image 2</label><br>
            <input type="file" name="image2" id="image2"
                class="w-full rounded-lg py-2 px-3 mb-3 border-gray-200 border-2"><br>
            <label for="image3">Image 3</label><br>
            <input type="file" name="image3" id="image3"
                class="w-full rounded-lg py-2 px-3 mb-3 border-gray-200 border-2"><br>



            <button type="submit" class="py-2 px-3 rounded-lg bg-sky-500">Submit</button>

        </form>
    </section>

    <script src="https://code.jquery.com/jquery-3.7.1.slim.js"
        integrity="sha256-UgvvN8vBkgO0luPSUl2s8TIlOSYRoGFAX4jlCIm9Adc=" crossorigin="anonymous"></script>

    <script>
        $('#add').on('click', function() {
            $('#facilities').append(`
            <select id="facility" name="facility[]"
                    class="w-full py-2 px-3 mb-3 pe-9 block border-2 border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600">
                    @foreach ($facilities as $facility)
                        <option selected="{{ $facility['nama'] }}" value="{{ $facility['id'] }}">{{ $facility['nama'] }}
                        </option>
                    @endforeach
                </select>
            `)
        })

        $("#remove").on("click", function() {
            if ($('#facilities select').length > 1) {
                $("#facility").last().remove();
            }

        })
    </script>
@endsection
