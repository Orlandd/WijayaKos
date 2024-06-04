@extends('dashboard.layouts.main')

@section('container')
    {{-- Place  --}}

    <section class="container ">
        <h3 class="text-3xl font-bold m-6">Booking List</h3>
    </section>

    @if (session('status'))
        <section class="container ">
            <div class="w-full p-3 border-2 border-sky-600 rounded-lg shadow-lg shadow-sky-300">
                {{ session('status') }}
            </div>
        </section>
    @endif


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
                                        Mulai</th>
                                    <th scope="col"
                                        class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase dark:text-neutral-500">
                                        Akhir</th>
                                    <th scope="col"
                                        class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase dark:text-neutral-500">
                                        Harga</th>
                                    <th scope="col"
                                        class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase dark:text-neutral-500">
                                        Kamar</th>
                                    <th scope="col"
                                        class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase dark:text-neutral-500">
                                        Kost</th>
                                    <th scope="col"
                                        class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase dark:text-neutral-500">
                                        Jenis</th>
                                    <th scope="col"
                                        class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase dark:text-neutral-500">
                                        Status</th>
                                    <th scope="col"
                                        class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase dark:text-neutral-500">
                                        user</th>
                                    <th scope="col"
                                        class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase dark:text-neutral-500">
                                        Bukti</th>
                                    <th scope="col"
                                        class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase dark:text-neutral-500">
                                        Approve</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200 dark:divide-neutral-700">
                                @foreach ($bookings as $booking)
                                    <tr class="hover:bg-gray-100 dark:hover:bg-neutral-700">
                                        <td
                                            class="px-6 py-4 whitespace-nowrap text-sm font-sm text-gray-800 dark:text-neutral-200">
                                            {{ $booking->mulai }}
                                        </td>
                                        <td
                                            class="px-6 py-4 whitespace-nowrap text-sm font-sm text-gray-800 dark:text-neutral-200">
                                            {{ $booking->akhir }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-neutral-200">
                                            {{ number_format($booking->harga) }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-neutral-200">
                                            {{ $booking->rooms->name }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-neutral-200">
                                            {{ $booking->rooms->dorms->nama }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-neutral-200">
                                            {{ $booking->jenis }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-neutral-200">
                                            {{ $booking->status }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-neutral-200">
                                            {{ $booking->users->name }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-neutral-200">
                                            <a href="/dashboard/bookings/{{ $booking->id }}"
                                                class="inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent text-green-600 hover:text-green-800 disabled:opacity-50 disabled:pointer-events-none dark:text-green-500 dark:hover:text-green-400">Detail</a>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-end text-sm font-medium">
                                            <form action="/dashboard/bookings/{{ $booking->id }}" method="post"
                                                class="inline-flex">
                                                @method('PUT')
                                                @csrf
                                                <button type="submit" onclick="return confirm('Are you sure approve ?')"
                                                    class="inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent text-blue-600 hover:text-blue-800 disabled:opacity-50 disabled:pointer-events-none dark:text-blue-500 dark:hover:text-blue-400">Approve</button>
                                            </form>
                                            <form action="/dashboard/bookings/{{ $booking->id }}/reject" method="post"
                                                class="inline-flex">
                                                @method('PUT')
                                                @csrf
                                                <button type="submit" onclick="return confirm('Are you sure reject ?')"
                                                    class="inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg
                                                    border border-transparent text-yellow-600 hover:text-yellow-800
                                                    disabled:opacity-50 disabled:pointer-events-none dark:text-yellow-500
                                                    dark:hover:text-yellow-400">Reject</button>

                                            </form>
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
