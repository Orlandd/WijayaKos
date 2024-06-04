@extends('dashboard.layouts.main')

@section('container')
    {{-- Place  --}}

    <section class="container px-3 mb-6">
        <h3 class="text-3xl font-bold ">Add Report</h3>
    </section>

    @if (session('status'))
        <section class="container ">
            <div class="w-full p-3 border-2 border-sky-600 rounded-lg shadow-lg shadow-sky-300">
                {{ session('status') }}
            </div>
        </section>
    @endif


    <section class="container mx-auto px-3">
        <form action="/dashboard/finances" method="post">
            @csrf
            <label for="nama">Name</label><br>
            <input type="text" name="nama" id="nama"
                class="w-full rounded-lg py-2 px-3 mb-3 border-gray-200 border-2"><br>
            <label for="nominal">Nominal</label><br>
            <input type="number" name="nominal" id="nominal" value="0" min="0"
                class="w-full rounded-lg py-2 px-3 mb-3 border-gray-200 border-2"><br>
            <label for="jenis">Jenis</label>
            <select id="jenis" name="jenis"
                class="w-full py-2 px-3 mb-3 pe-9 block border-2 border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600">
                @foreach ($types as $type)
                    <option selected="{{ $type['name'] }}" value="{{ $type['id'] }}">{{ $type['name'] }}
                    </option>
                @endforeach

            </select>
            <label for="deskripsi">Deskripsi</label><br>
            <input type="text" name="deskripsi" id="deskripsi"
                class="w-full rounded-lg py-2 px-3 mb-3 border-gray-200 border-2"><br>
            <label for="tanggal">Tanggal</label><br>
            <input type="date" name="tanggal" id="tanggal"
                class="w-full rounded-lg py-2 px-3 mb-3 border-gray-200 border-2"><br>


            <button type="submit" class="py-2 px-3 rounded-lg bg-sky-500">Submit</button>

        </form>
    </section>
@endsection
