@extends('layouts.app')

@section('content')
    <div class="container mx-auto">
        <div class="gap-10 w-full max-w-4xl bg-white rounded-lg p-6 flex flex-col sm:flex-row">
            <div class="card bg-white shadow-md rounded-lg overflow-hidden sm:min-w-60 md:min-w-80">
                <img src="/storage/img/kamar.jpg" class="card-img-top h-52 w-full object-cover" alt="...">
                <div class="p-4">
                    <p class="card-title font-semibold text-lg">{{ $booking->rooms->name }}</p>
                    {{-- <p class="card-text text-gray-600">{{ $booking-> }}</p> --}}
                    <p class="card-text text-gray-600">Time : <span id="long">1</span> month</p>
                    <p class="card-price font-semibold text-gray-700 pt-2" id="harga">Rp
                        {{ number_format($booking->rooms->harga) }},00
                    </p>

                    <br>
                    <hr>
                    <p class="text-center">Start : {{ $bookingApprove->akhir }}</p>
                    {{-- <p class="text-center">{{ date('d-m-Y') }}</p> --}}
                </div>
            </div>

            <div class="order-1 md:order-2 flex-grow mb-6 md:mb-0">
                <h2 class="text-2xl font-semibold text-gray-700 mb-4">Booking</h2>
                <p class="text-lg text-gray-500 mb-6">Your Data</p>
                <input type="text" placeholder="Name" name="nama"
                    class="border-2 border-yellow-500 rounded-full px-4 py-2 w-full mb-4" value="{{ auth()->user()->name }}"
                    disabled>
                <input type="text" placeholder="Phone" name="phone"
                    class="border-2 border-yellow-500 rounded-full px-4 py-2 w-full mb-4" value="{{ auth()->user()->nohp }}"
                    disabled>
                <input type="email" placeholder="Email" name="email"
                    class="border-2 border-yellow-500 rounded-full px-4 py-2 w-full mb-4"
                    value="{{ auth()->user()->email }}" disabled>
                <form action="/profile/extend" method="post" class="mx-auto" enctype="multipart/form-data">
                    @csrf
                    <input type="text" id="total" placeholder="Name" name="harga"
                        class="border-2 border-yellow-500 rounded-full px-4 py-2 w-full mb-4"
                        value="{{ $booking->rooms->harga }}" hidden>

                    <input type="text" id="kamar" placeholder="Name" name="kamar"
                        class="border-2 border-yellow-500 rounded-full px-4 py-2 w-full mb-4"
                        value="{{ $booking->rooms->id }}" hidden>

                    <hr>
                    <label for="time">How Long? (in month)</label>
                    <input type="number" placeholder="time" id="time" name="time" min="1" step="1"
                        value="1" class="border-2 border-yellow-500 rounded-full px-4 py-2 w-full mb-4">
                    <label for="bukti">
                        Proof of payment (image jpg/png/jpeg)</label>
                    <input type="file" placeholder="time" id="bukti" name="bukti"
                        class="border-2 border-yellow-500 rounded-full px-4 py-2 w-full mb-4">

                    <button type="submit"
                        class="bg-teal-500 text-white font-semibold py-2 px-6 rounded-full transition-transform hover:scale-105">Book</button>
                </form>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.7.1.slim.js"
        integrity="sha256-UgvvN8vBkgO0luPSUl2s8TIlOSYRoGFAX4jlCIm9Adc=" crossorigin="anonymous"></script>

    <script>
        $(document).ready(function() {
            $('#time').change(function() {
                let time = $(this).val();
                let formatter = new Intl.NumberFormat('id-ID', {
                    style: 'currency',
                    currency: 'IDR'
                });


                $('#harga').text(formatter.format({{ $booking->rooms->harga }} * time));
                $('#total').val({{ $booking->rooms->harga }} * time);
                $('#long').text(time);

            });
        });
    </script>
@endsection
