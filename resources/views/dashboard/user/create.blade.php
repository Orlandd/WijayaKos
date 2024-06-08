@extends('dashboard.layouts.main')

@section('container')
    <section class="container px-3 mb-6">
        <h1 class="text-3xl font-bold">Create New User</h1>
    </section>

    <section class="container mx-auto px-3">
        <form action="{{ route('users.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" name="name" id="name" value="{{ old('name') }}" class="rounded-lg py-2 px-3 mb-3 border-gray-200 border-2 @error('name') is-invalid @enderror">
                @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="nohp">Phone Number:</label>
                <input type="text" name="nohp" id="nohp" value="{{ old('nohp') }}" class="rounded-lg py-2 px-3 mb-3 border-gray-200 border-2 @error('nohp') is-invalid @enderror">
                @error('nohp')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" name="email" id="email" value="{{ old('email') }}" class="rounded-lg py-2 px-3 mb-3 border-gray-200 border-2 @error('email') is-invalid @enderror">
                @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" name="password" id="password" class="rounded-lg py-2 px-3 mb-3 border-gray-200 border-2 @error('password') is-invalid @enderror">
                @error('password')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="password_confirmation">Confirm Password:</label>
                <input type="password" name="password_confirmation" id="password_confirmation" class="rounded-lg py-2 px-3 mb-3 border-gray-200 border-2">
            </div>

            <button type="submit" class="py-2 px-4 rounded-lg bg-blue-500 text-white">Create User</button>
        </form>
    </section>
@endsection
