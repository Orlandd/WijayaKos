@extends('layouts.app')

@section('content')
    <section class="container mx-auto px-4 ">
        <div class=" flex flex-wrap mx-auto md:flex-nowrap gap-1 h-full mt-10">

            <div class="w-full flex gap-1 md:w-1/2">
                <div class="bg-no-repeat bg-center bg-cover md:hidden mx-auto w-[400px] h-[300px] md:w-[300px] md:h-[608px] bg-slate-500 rounded-xl overflow-hidden"
                    style="background-image: url(/storage/hero/4.jpg)">
                </div>
                <div class=" grid-cols-2 grid-flow-row gap-4 w-full hidden md:grid">

                    <div class="row-span-2">
                        <div class="bg-no-repeat bg-center bg-cover hidden mx-auto w-[400px] h-[300px] md:w-full md:h-[416px] md:inline-block bg-slate-500 rounded-xl overflow-hidden"
                            style="background-image: url(/storage/hero/1.jpg)">
                            {{-- <img src="/storage/hero/1.jpg" alt=""> --}}
                        </div>
                    </div>
                    <div>
                        <div class="bg-no-repeat bg-center bg-cover	hidden mx-auto w-[400px] h-[300px] md:w-full  md:max-h-[200px] md:inline-block bg-slate-500 rounded-xl overflow-hidden"
                            style="background-image: url(/storage/hero/2.jpg)">
                            {{-- <img src="/storage/hero/2.jpg" alt=""> --}}
                        </div>
                    </div>
                    <!-- ... -->
                    <div>
                        <div class="bg-no-repeat bg-center bg-cover 	hidden mx-auto w-[400px] h-[300px] md:w-full md:max-h-[200px] md:inline-block bg-slate-500 rounded-xl overflow-hidden"
                            style="background-image: url(/storage/hero/3.jpg)">
                            {{-- <img src="/storage/hero/3.jpg" alt=""> --}}

                        </div>
                    </div>
                    <div class="col-span-2">
                        <div class="bg-no-repeat bg-center bg-cover	hidden mx-auto w-[400px] h-[300px] md:w-full md:max-h-[200px] md:inline-block bg-slate-500 rounded-xl overflow-hidden"
                            style="background-image: url(/storage/hero/4.jpg)">
                        </div>

                    </div>

                </div>


            </div>

            <div class="w-full mx-auto my-auto md:max-w-[440px]">
                <img src="storage/gambar/logo.png" class="w-full" alt="">
                <p class="text-lg py-5">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Corporis inventore
                    voluptates hic labore totam soluta accusamus vero aperiam, tenetur assumenda.</p>

                <div class="flex justify-evenly gap-4">
                    <a href="/home"
                        class="px-6 py-3 rounded-full bg-[#2EC4B6] text-white hover:scale-105 hover:shadow-lg hover:shadow-teal-500/25 transition-all ease-in-out">Order
                        Now</a>
                    <a href="#"
                        class="px-6 py-3 rounded-full bg-[#FFFFFF] border-2 border-[#FF9F1C] hover:scale-105 hover:shadow-lg hover:shadow-orange-500/25 transition-all ease-in-out">Contact
                        Us</a>
                </div>
            </div>

        </div>
    </section>
@endsection
