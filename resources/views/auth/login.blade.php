@extends('layouts.app')

@section('content')
    <div class="container mx-auto">
        {{-- <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Login') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <div class="row mb-3">
                                <label for="email"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email"
                                        class="form-control @error('email') is-invalid @enderror" name="email"
                                        value="{{ old('email') }}" required autocomplete="email" autofocus>

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
                                        required autocomplete="current-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-6 offset-md-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                            {{ old('remember') ? 'checked' : '' }}>

                                        <label class="form-check-label" for="remember">
                                            {{ __('Remember Me') }}
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Login') }}
                                    </button>

                                    @if (Route::has('password.request'))
                                        <a class="btn btn-link" href="{{ route('password.request') }}">
                                            {{ __('Forgot Your Password?') }}
                                        </a>
                                    @endif
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div> --}}

        <section class="container m-auto px-4 mt-4">
            <div class="max-w-[600px] mx-auto">
                <div class="bg-slate-500 w-full h-28"></div>
                <h1 class="text-center text-3xl my-4">Login</h1>
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <label for="email" class="">Email</label>
                    <input type="email" name="email" id="email"
                        class="w-full h-8 px-4 border-2 mb-5 rounded-full border-orange-400  focus:shadow-lg transition-all ease-in-out duration-300"
                        autofocus placeholder="Your email ...">

                    <label for="password" class="">Password</label>
                    <input type="password" name="password" id="password"
                        class="w-full h-8 px-4 border-2 rounded-full border-orange-400 focus:shadow-lg transition-all ease-in-out duration-300">
                    @if (Route::has('password.request'))
                        <a class="btn btn-link" href="{{ route('password.request') }}">
                            {{ __('Forgot Your Password?') }}
                        </a>
                    @endif
                    <br>
                    <input class="form-check-input" type="checkbox" name="remember" id="remember"
                        {{ old('remember') ? 'checked' : '' }}>


                    <label class="form-check-label" for="remember">
                        {{ __('Remember Me') }}
                    </label>



                    <p class="text-center mt-6">Doesn't have an account? <a href="/register" class="font-bold">Register</a>
                    </p>
                    <div class="flex justify-center mt-2 flex-wrap">
                        <button type="submit"
                            class="px-5 py-2 bg-white border-2 rounded-full  border-orange-400 hover:bg-orange-300 hover:shadow-md hover:shadow-orange-600 active:bg-orange-400 active:shadow-lg transition-all ease-in-out duration-300">Login</button>
                    </div>

                </form>
            </div>
        </section>
    </div>
@endsection
