@extends('layouts.app')

@section('content')
    <div class="container mx-auto">
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
        </section>

    </div>
@endsection
