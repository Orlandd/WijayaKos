@extends('dashboard.layouts.main')

@section('container')
    {{-- Place  --}}

    <section class="container ">
        <h3 class="text-3xl font-bold m-6">Finance Report</h3>
    </section>

    @if (session('status'))
        <section class="container ">
            <div class="w-full p-3 border-2 border-sky-600 rounded-lg shadow-lg shadow-sky-300">
                {{ session('status') }}
            </div>
        </section>
    @endif


    <section class="container mx-6 my-4">
        <a href="/dashboard/finances/create" class="px-4 py-2 bg-sky-500 rounded-full text-white">New Report</a>
    </section>


    <section class="container px-3">
        <div class=" flex flex-col w-full ">
            <div class="m-1.5 overflow-x-auto">
                <div class="p-1.5  inline-block align-middle">
                    <div class="overflow-hidden">
                        <table class=" divide-y divide-gray-200 dark:divide-neutral-700">
                            <thead>
                                <tr>
                                    <th scope="col"
                                        class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase dark:text-neutral-500">
                                        Nama</th>
                                    <th scope="col"
                                        class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase dark:text-neutral-500">
                                        Nominal</th>
                                    <th scope="col"
                                        class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase dark:text-neutral-500">
                                        Jenis</th>
                                    <th scope="col"
                                        class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase dark:text-neutral-500">
                                        Deskripsi</th>
                                    <th scope="col"
                                        class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase dark:text-neutral-500">
                                        Tanggal</th>
                                    <th scope="col"
                                        class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase dark:text-neutral-500">
                                        User</th>
                                    <th scope="col"
                                        class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase dark:text-neutral-500">
                                        Actions</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200 dark:divide-neutral-700">
                                @foreach ($finances as $finance)
                                    <tr class="hover:bg-gray-100 dark:hover:bg-neutral-700">
                                        <td
                                            class="px-6 py-4 whitespace-nowrap text-sm font-sm text-gray-800 dark:text-neutral-200">
                                            {{ $finance->nama }}
                                        </td>
                                        <td
                                            class="px-6 py-4 whitespace-nowrap text-sm font-sm text-gray-800 dark:text-neutral-200">
                                            {{ number_format($finance->nominal) }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-neutral-200">
                                            {{ $finance->types[0]->name }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-neutral-200">
                                            {{ $finance->deskripsi }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-neutral-200">
                                            {{ $finance->tanggal }}
                                        </td>
                                        <td
                                            class="px-6 py-4 whitespace-nowrap text-sm text-center text-gray-800 dark:text-neutral-200">
                                            @if (isset($finance->users->name))
                                                {{ $finance->users->name }}
                                            @else
                                                -
                                            @endif
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium">
                                            <a href="/dashboard/finances/{{ $finance->id }}"
                                                class="inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent text-green-600 hover:text-green-800 disabled:opacity-50 disabled:pointer-events-none dark:text-green-500 dark:hover:text-green-400">Detail</a>

                                            @if (!isset($finance->users->name))
                                                <a href="/dashboard/finances/{{ $finance->id }}/edit"
                                                    class="inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent text-yellow-600 hover:text-yellow-800 disabled:opacity-50 disabled:pointer-events-none dark:text-yellow-500 dark:hover:text-yellow-400">Update</a>
                                            @endif


                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
