@extends('dashboard.layouts.main')

@section('container')
    {{-- Place  --}}

    <section class="container ">
        <h3 class="text-3xl font-bold m-6">Rooms</h3>
    </section>

    @if (session('status'))
        <section class="container ">
            <div class="w-full p-3 border-2 border-sky-600 rounded-lg shadow-lg shadow-sky-300">
                {{ session('status') }}
            </div>
        </section>
    @endif

    <section class="container mx-6 my-4">
        <a href="/dashboard/rooms/create" class="px-4 py-2 bg-teal-500 rounded-full text-white">Add Room</a>
        <div class="hs-dropdown relative inline-flex">
            <button id="hs-dropdown-default" type="button"
                class="hs-dropdown-toggle py-3 px-4 inline-flex items-center gap-x-2 text-sm font-medium rounded-full border border-teal-500 bg-white text-gray-800 shadow-sm hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-white dark:hover:bg-neutral-800">
                Kost
                <svg class="hs-dropdown-open:rotate-180 size-4" xmlns="http://www.w3.org/2000/svg" width="24"
                    height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                    stroke-linecap="round" stroke-linejoin="round">
                    <path d="m6 9 6 6 6-6" />
                </svg>
            </button>

            <div class="hs-dropdown-menu transition-[opacity,margin] duration hs-dropdown-open:opacity-100 opacity-0 hidden min-w-60 bg-white shadow-md rounded-lg p-2 mt-2 dark:bg-neutral-800 dark:border dark:border-neutral-700 dark:divide-neutral-700 after:h-4 after:absolute after:-bottom-4 after:start-0 after:w-full before:h-4 before:absolute before:-top-4 before:start-0 before:w-full"
                aria-labelledby="hs-dropdown-default">
                <a class="flex items-center gap-x-3.5 py-2 px-3 rounded-lg text-sm text-gray-800 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 dark:text-neutral-400 dark:hover:bg-neutral-700 dark:hover:text-neutral-300 dark:focus:bg-neutral-700"
                    href="/dashboard/rooms">
                    All
                </a>
                @foreach ($kost as $kos)
                    <a class="flex items-center gap-x-3.5 py-2 px-3 rounded-lg text-sm text-gray-800 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 dark:text-neutral-400 dark:hover:bg-neutral-700 dark:hover:text-neutral-300 dark:focus:bg-neutral-700"
                        href="/dashboard/rooms?kost={{ $kos->nama }}">
                        {{ $kos->nama }}
                    </a>
                @endforeach

            </div>
        </div>
    </section>

    <section class="container px-3">
        <div class=" flex flex-col w-full ">
            <div class="m-1.5 overflow-x-auto">
                <div class="p-1.5  inline-block align-middle">
                    <div class="overflow-hidden border-2 rounded-xl p-2">
                        <table
                            class=" divide-y divide-gray-200 dark:divide-neutral-700 rounded-xl overflow-hidden border-b-2 mb-3 ">
                            <thead class="bg-teal-200 ">
                                <tr>
                                    <th scope="col"
                                        class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase dark:text-neutral-500">
                                        Name</th>
                                    <th scope="col"
                                        class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase dark:text-neutral-500">
                                        Kost</th>
                                    <th scope="col"
                                        class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase dark:text-neutral-500">
                                        Room Type</th>
                                    <th scope="col"
                                        class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase dark:text-neutral-500">
                                        Kost Type</th>
                                    <th scope="col"
                                        class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase dark:text-neutral-500">
                                        Price</th>
                                    {{-- <th scope="col"
                                        class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase dark:text-neutral-500">
                                        Description</th> --}}
                                    <th scope="col"
                                        class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase dark:text-neutral-500">
                                        Status</th>
                                    <th scope="col"
                                        class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase dark:text-neutral-500">
                                        Action</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200 dark:divide-neutral-700">
                                @foreach ($rooms as $room)
                                    <tr class="hover:bg-gray-100 dark:hover:bg-neutral-700">
                                        <td
                                            class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 dark:text-neutral-200">
                                            {{ $room->name }}
                                        </td>
                                        <td
                                            class="px-6 py-4 whitespace-nowrap text-sm font-sm text-gray-800 dark:text-neutral-200">
                                            {{ $room->dorms->nama }}
                                        </td>
                                        <td
                                            class="px-6 py-4 whitespace-nowrap text-sm font-sm text-gray-800 dark:text-neutral-200">
                                            {{ $room->tipe }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-neutral-200">
                                            {{ $room->dorms->jenis }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-neutral-200">
                                            Rp.{{ number_format($room->harga) }},00
                                        </td>
                                        {{-- <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-neutral-200">
                                            {{ $room->deskripsi }}
                                        </td> --}}
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-neutral-200">
                                            {{ $room->status }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-end text-sm font-medium">
                                            <a href="/dashboard/rooms/{{ $room->id }}"
                                                class="inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent text-green-600 hover:text-green-800 disabled:opacity-50 disabled:pointer-events-none dark:text-green-500 dark:hover:text-green-400">Detail</a>
                                            <a href="/dashboard/rooms/{{ $room->id }}/edit"
                                                class="inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent text-yellow-600 hover:text-yellow-800 disabled:opacity-50 disabled:pointer-events-none dark:text-yellow-500 dark:hover:text-yellow-400">Update</a>

                                            <form action="/dashboard/rooms/{{ $room->id }}" method="post"
                                                class="inline-flex">
                                                @method('delete')
                                                @csrf
                                                <button type="submit" onclick="return confirm('Are you sure delete ?')"
                                                    class="inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent text-blue-600 hover:text-blue-800 disabled:opacity-50 disabled:pointer-events-none dark:text-blue-500 dark:hover:text-blue-400">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                        {{ $rooms->links() }}
                    </div>
                </div>
            </div>
        </div>

    </section>
@endsection
