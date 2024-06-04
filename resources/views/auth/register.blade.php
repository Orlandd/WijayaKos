@extends('layouts.app')

@section('content')
    {{-- <div class="container mx-auto">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Register') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf

                            <div class="row mb-3">
                                <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text"
                                        class="form-control @error('name') is-invalid @enderror" name="name"
                                        value="{{ old('name') }}" required autocomplete="name" autofocus>

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="email"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email"
                                        class="form-control @error('email') is-invalid @enderror" name="email"
                                        value="{{ old('email') }}" required autocomplete="email">

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="password"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        required autocomplete="new-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="password-confirm"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control"
                                        name="password_confirmation" required autocomplete="new-password">
                                </div>
                            </div>

                            <div class="row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Register') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <section class="container m-auto px-4 mt-4">
            <div class="max-w-[600px] mx-auto">
                <div class="bg-slate-500 w-full h-28"></div>
                <h1 class="text-center text-3xl my-4">Register</h1>
                <form method="POST" action="{{ route('register') }}">
                    @csrf
                    <label for="name" class="">Name</label>
                    <input type="text" name="name" id="name"
                        class="w-full h-8 px-4 border-2 mb-5 rounded-full border-orange-400 focus:shadow-lg transition-all ease-in-out duration-300"
                        autofocus placeholder="Your full name ...">

                    <label for="email" class="">Email</label>
                    <input type="email" name="email" id="email"
                        class="w-full h-8 px-4 border-2 mb-5 rounded-full border-orange-400 focus:shadow-lg transition-all ease-in-out duration-300"
                        placeholder="Your email ...">

                    <label for="nohp" class="">Nomor Telepon</label>
                    <input type="text" name="nohp" id="nohp"
                        class="w-full h-8 px-4 border-2 mb-5 rounded-full border-orange-400 focus:shadow-lg transition-all ease-in-out duration-300"
                        placeholder="Your telepon number ...">

                    <label for="password" class="">Password</label>
                    <input type="password" name="password" id="password"
                        class="w-full h-8 px-4 border-2 mb-5 rounded-full border-orange-400 focus:shadow-lg transition-all ease-in-out duration-300">

                    <label for="password-confirm" class="">Confirm Password</label>
                    <input type="password" name="password_confirmation" id="password"
                        class="w-full h-8 px-4 border-2 rounded-full border-orange-400 focus:shadow-lg transition-all ease-in-out duration-300">
                    <p class="text-center mt-6">Does have an account? <a href="/login" class="font-bold">Login</a>

                    <div class="flex justify-center mt-2 flex-wrap">
                        <button type="submit"
                            class="px-5 py-2 bg-white border-2 rounded-full  border-orange-400 hover:bg-orange-300 hover:shadow-md hover:shadow-orange-600 active:bg-orange-400 active:shadow-lg transition-all ease-in-out duration-300">{{ __('Register') }}</button>
                    </div>

                </form>
            </div>
        </section> --}}

    <section>
        <div class="container mx-auto mt-6 h-full">
            <div class="flex flex-col lg:flex-row">
                <div class="w-full lg:w-1/2 flex items-center">
                    <div class="w-full max-w-lg mx-auto p-8 bg-white rounded-lg shadow-md">
                        <h4 class="text-center font-bold text-teal-500 mb-6">Sign Up</h4>
                        <form class="space-y-4" method="POST" action="{{ route('register') }}">
                            @csrf
                            <div>
                                <label for="name" class="block text-sm font-bold text-teal-500">Name</label>
                                <input type="text" name="name" id="name"
                                    class="mt-1 block w-full border-2 border-orange-300 rounded-full p-2 italic"
                                    placeholder="eg. Ronald Maxime">
                            </div>
                            <div>
                                <label for="nohp" class="block text-sm font-bold text-teal-500">Phone</label>
                                <input type="text" id="nohp" name="nohp"
                                    class="mt-1 block w-full border-2 border-orange-300 rounded-full p-2 italic"
                                    placeholder="eg. 081XXXXXXXX">
                            </div>
                            <div>
                                <label for="email" class="block text-sm font-bold text-teal-500">Email
                                    address</label>
                                <input type="email" name="email" id="email"
                                    class="mt-1 block w-full border-2 border-orange-300 rounded-full p-2 italic"
                                    placeholder="eg.ronaldmax6378@gmail.com">
                            </div>
                            <div>
                                <label for="password" class="block text-sm font-bold text-teal-500">Password</label>
                                <input type="password" id="password" name="password"
                                    class="mt-1 block w-full border-2 border-orange-300 rounded-full p-2 italic"
                                    placeholder="eg.rbskl827T">
                            </div>
                            <div>
                                <label for="password-confirm" class="block text-sm font-bold text-teal-500">Password
                                    Confirm</label>
                                <input type="password" name="password_confirmation" id="password"
                                    class="mt-1 block w-full border-2 border-orange-300 rounded-full p-2 italic"
                                    placeholder="eg.rbskl827T">
                            </div>
                            <a href="/login"
                                class="block text-center font-bold mt-4 text-teal-500 hover:text-teal-700">Have an
                                Account? Log in</a>
                            <div class="flex justify-center">
                                <button type="submit"
                                    class="mt-1 px-4 py-3 block w-1/2 border-2 border-orange-300 text-teal-500 font-bold rounded-full hover:scale-105 transition-transform">Sign
                                    Up</button>
                            </div>
                        </form>

                    </div>
                </div>
                <div class="w-full lg:w-1/2 mt-6 lg:mt-0">
                    <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-inner rounded-lg shadow-lg">
                            <div class="carousel-item active">
                                <img src="https://source.unsplash.com/720x1080?real-estate?orientation=portrait"
                                    class="rounded-lg block w-full h-[30vh] md:h-[100vh]  filter brightness-50"
                                    alt="Stage">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- </div> --}}
@endsection
