@extends('dashboard.layouts.main')

@section('container')
    {{-- Place  --}}

    <section class="container px-3 mb-6">
        <h3 class="text-3xl font-bold ">Add Kost</h3>
    </section>

    @if (session('status'))
        <section class="container ">
            <div class="w-full p-3 border-2 border-sky-600 rounded-lg shadow-lg shadow-sky-300">
                {{ session('status') }}
            </div>
        </section>
    @endif


    <section class="container mx-auto px-3">
        <form action="/dashboard/dorms/" method="post" enctype="multipart/form-data">
            @csrf
            <label for="nama">Name</label><br>
            <input type="text" name="nama" id="nama"
                class="w-full rounded-lg py-2 px-3 mb-3 border-gray-200 border-2"><br>
            <label for="location">Location</label>
            <select id="location" name="location"
                class="w-full py-2 px-3 mb-3 pe-9 block border-2 border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600">
                @foreach ($locations as $location)
                    <option selected="{{ $location['nama'] }}" value="{{ $location['id'] }}">{{ $location['nama'] }}
                    </option>
                @endforeach

            </select>
            <label for="address">Address</label><br>
            <input type="text" name="address" id="address"
                class="w-full rounded-lg py-2 px-3 mb-3 border-gray-200 border-2"><br>
            <label for="jenis">Type</label>
            <select id="jenis" name="jenis"
                class="w-full py-2 px-3 mb-3 pe-9 block  border-2 border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600">

                <option selected="putra" value="putra">Putra
                </option>

                <option selected="putri" value="putri">Putri
                </option>

            </select>
            <label for="deskripsi">Description</label><br>
            <input type="text" name="deskripsi" id="deskripsi"
                class="w-full rounded-lg py-2 px-3 mb-3 border-gray-200 border-2"><br>

            <label for="image">Image</label><br>
            <input type="file" name="image" id="image"
                class="w-full rounded-lg py-2 px-3 mb-3 border-gray-200 border-2"><br>

            <button type="submit" class="py-2 px-3 rounded-lg bg-sky-500">Submit</button>

        </form>
    </section>
@endsection
