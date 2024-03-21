@extends('layouts.app')

@section('content')
    <div class="container mx-auto">
        <div class="px-4">
            <h1 class="text-3xl mb-3">Dorm Rooms</h1>
            <div class="flex mb-4">
                <button class="py-2 px-4 bg-red-600 rounded-full ms-3 scale-100 active:scale-95">Cowok</button>
                <button class="py-2 px-4 bg-cyan-500 rounded-full ms-3 scale-100 active:scale-95">Cewek</button>

            </div>
            <div class=" relative grid grid-cols-2 gap-4 md:grid-cols-4 lg:grid-cols-7 lg:gap-2">
                @for ($i = 0; $i < 10; $i++)
                    <a
                        class="w-full shadow-xl border-1 my-2 border-stone-700 h-64 rounded-xl overflow-hidden scale-100 hover:scale-105 transition-all ease-in-out max-w-48">
                        <div class="bg-slate-500 w-full h-28 "></div>
                        <div class="mx-3 mt-2 ">
                            <div class=" w-full">

                            </div>

                            <div class="w-full ">
                                <p>Lorem ipsum dolor sit amet.</p>
                            </div>

                            <div class="absolute bottom-2">1000/bulan</div>
                        </div>
                    </a>
                @endfor

            </div>
        </div>
    </div>
@endsection
