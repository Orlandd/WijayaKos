@extends('dashboard.layouts.main')

@section('container')
    {{-- Place  --}}

    <section class="container">
        <h3 class="text-3xl font-bold m-6">Kost Detail</h3>
    </section>

    @if (session('status'))
        <section class="container">
            <div class="w-full p-3 border-2 border-sky-600 rounded-lg shadow-lg shadow-sky-300">
                {{ session('status') }}
            </div>
        </section>
    @endif

    <section class="container px-3">
        <div class="flex flex-col w-full">
            <div class="m-1.5 overflow-x-auto">
                <div class="p-1.5 inline-block align-middle">
                    <div class="overflow-hidden">
                        <table class="divide-y divide-gray-200 dark:divide-neutral-700">
                            <thead>
                                <tr>
                                    <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase dark:text-neutral-500">
                                        Jenis
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase dark:text-neutral-500">
                                        Penjelasan
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200 dark:divide-neutral-700">
                                <tr class="hover:bg-gray-100 dark:hover:bg-neutral-700">
                                    <td class="px-6 py-4 text-sm font-medium text-gray-800 dark:text-neutral-200">Name</td>
                                    <td class="px-6 py-4 text-sm text-gray-800 dark:text-neutral-200">{{ $dorm->nama }}</td>
                                </tr>
                                <tr class="hover:bg-gray-100 dark:hover:bg-neutral-700">
                                    <td class="px-6 py-4 text-sm font-medium text-gray-800 dark:text-neutral-200">Location</td>
                                    <td class="px-6 py-4 text-sm text-gray-800 dark:text-neutral-200">{{ $dorm->locations[0]->nama }}</td>
                                </tr>
                                <tr class="hover:bg-gray-100 dark:hover:bg-neutral-700">
                                    <td class="px-6 py-4 text-sm font-medium text-gray-800 dark:text-neutral-200">Address</td>
                                    <td class="px-6 py-4 text-sm text-gray-800 dark:text-neutral-200">{{ $dorm->lokasi }}</td>
                                </tr>
                                <tr class="hover:bg-gray-100 dark:hover:bg-neutral-700">
                                    <td class="px-6 py-4 text-sm font-medium text-gray-800 dark:text-neutral-200">Description</td>
                                    <td class="px-6 py-4 text-sm text-gray-800 dark:text-neutral-200">{{ $dorm->deskripsi }}</td>
                                </tr>
                                <tr class="hover:bg-gray-100 dark:hover:bg-neutral-700">
                                    <td class="px-6 py-4 text-sm font-medium text-gray-800 dark:text-neutral-200">Type</td>
                                    <td class="px-6 py-4 text-sm text-gray-800 dark:text-neutral-200">{{ $dorm->jenis }}</td>
                                </tr>
                                <tr class="hover:bg-gray-100 dark:hover:bg-neutral-700">
                                    <td class="px-6 py-4 text-sm font-medium text-gray-800 dark:text-neutral-200">Image</td>
                                    <td class="px-6 py-4 text-sm text-gray-800 dark:text-neutral-200">
                                        @if ($dorm->images->isNotEmpty())
                                            <img src="{{ asset('storage/dorms/' . $dorm->images[0]->image) }}" alt="Dorm Image" class="w-32 h-32 object-cover rounded-lg">
                                        @else
                                            No image available
                                        @endif
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="mt-4">
                            <a href="/dashboard/dorms" class="px-4 py-2 bg-gray-500 rounded-full text-white">Back</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
