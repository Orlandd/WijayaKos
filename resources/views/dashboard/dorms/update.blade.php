@extends('dashboard.layouts.main')

@section('container')
    <section class="container ">
        <h3 class="text-3xl font-bold m-6">Update Kost</h3>
    </section>

    @if (session('status'))
        <section class="container ">
            <div class="w-full p-3 border-2 border-sky-600 rounded-lg shadow-lg shadow-sky-300">
                {{ session('status') }}
            </div>
        </section>
    @endif

    <section class="container mx-6 my-4">
        <form action="/dashboard/dorms/{{ $dorm->id }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('put')
            
            {{-- Update Name --}}
            <div class="mb-4">
                <label for="nama" class="block text-sm font-medium text-gray-700 dark:text-neutral-200">Name</label>
                <input type="text" name="nama" id="nama" value="{{ $dorm->nama }}" required
                    class="mt-1 block w-full px-3 py-2 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-sky-500 focus:border-sky-500 sm:text-sm dark:bg-neutral-700 dark:border-neutral-600 dark:text-neutral-200">
            </div>

            {{-- Update Location --}}
            <div class="mb-4">
                <label for="location" class="block text-sm font-medium text-gray-700 dark:text-neutral-200">Location</label>
                <select name="location" id="location" required
                    class="mt-1 block w-full px-3 py-2 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-sky-500 focus:border-sky-500 sm:text-sm dark:bg-neutral-700 dark:border-neutral-600 dark:text-neutral-200">
                    @foreach ($locations as $location)
                        <option value="{{ $location->id }}" {{ $dorm->locations[0]->id == $location->id ? 'selected' : '' }}>{{ $location->nama }}</option>
                    @endforeach
                </select>
            </div>

            {{-- Update Address --}}
            <div class="mb-4">
                <label for="address" class="block text-sm font-medium text-gray-700 dark:text-neutral-200">Address</label>
                <input type="text" name="address" id="address" value="{{ $dorm->lokasi }}" required
                    class="mt-1 block w-full px-3 py-2 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-sky-500 focus:border-sky-500 sm:text-sm dark:bg-neutral-700 dark:border-neutral-600 dark:text-neutral-200">
            </div>

            {{-- Update Description --}}
            <div class="mb-4">
                <label for="deskripsi" class="block text-sm font-medium text-gray-700 dark:text-neutral-200">Description</label>
                <textarea name="deskripsi" id="deskripsi" rows="3" required
                    class="mt-1 block w-full px-3 py-2 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-sky-500 focus:border-sky-500 sm:text-sm dark:bg-neutral-700 dark:border-neutral-600 dark:text-neutral-200">{{ $dorm->deskripsi }}</textarea>
            </div>

            {{-- Update Type --}}
            <div class="mb-4">
                <label for="jenis" class="block text-sm font-medium text-gray-700 dark:text-neutral-200">Type</label>
                <input type="text" name="jenis" id="jenis" value="{{ $dorm->jenis }}" required
                    class="mt-1 block w-full px-3 py-2 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-sky-500 focus:border-sky-500 sm:text-sm dark:bg-neutral-700 dark:border-neutral-600 dark:text-neutral-200">
            </div>

            {{-- Update Image --}}
            <div class="mb-4">
                <label for="image" class="block text-sm font-medium text-gray-700 dark:text-neutral-200">Image</label>
                <input type="file" name="image" id="image"
                    class="mt-1 block w-full text-sm text-gray-900 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-sky-500 focus:border-sky-500 sm:text-sm dark:bg-neutral-700 dark:border-neutral-600 dark:text-neutral-200">
            </div>

            {{-- Update Action --}}
            <div class="mb-4">
                <button type="submit" class="inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent text-blue-600 hover:text-blue-800 disabled:opacity-50 disabled:pointer-events-none dark:text-blue-500 dark:hover:text-blue-400">Update Kost</button>
                <a href="/dashboard/dorms" class="inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent text-blue-600 hover:text-blue-800 disabled:opacity-50 disabled:pointer-events-none dark:text-blue-500 dark:hover:text-blue-400">Cancel</a>
            </div>
        </form>
    </section>
@endsection
