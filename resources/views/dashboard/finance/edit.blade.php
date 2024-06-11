@extends('dashboard.layouts.main')

@section('container')
    <section class="container px-3 mb-6">
        <h1 class="text-3xl font-bold">Edit Finance</h1>
    </section>

    @if (session('status'))
        <section class="container">
            <div class="w-full p-3 border-2 border-sky-600 rounded-lg shadow-lg shadow-sky-300">
                {{ session('status') }}
            </div>
        </section>
    @endif

    <section class="container mx-auto px-3">
        <form action="{{ route('finances.update', $finance->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="nama" class="block mb-1">Name:</label>
                <input type="text" name="nama" id="nama" value="{{ old('nama', $finance->nama) }}" class="rounded-lg py-2 px-3 mb-3 block w-full border-gray-200 border-2 @error('nama') is-invalid @enderror">
                @error('nama')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="nominal" class="block mb-1">Nominal:</label>
                <input type="number" name="nominal" id="nominal" value="{{ old('nominal', $finance->nominal) }}" class="rounded-lg py-2 px-3 mb-3 block w-full border-gray-200 border-2 @error('nominal') is-invalid @enderror">
                @error('nominal')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="jenis" class="block mb-1">Type:</label>
                <select id="jenis" name="jenis[]" class="rounded-lg py-2 px-3 mb-3 block w-full border-gray-200 border-2 @error('jenis') is-invalid @enderror" multiple>
                    @foreach ($types as $type)
                        <option value="{{ $type->id }}" @if(in_array($type->id, $finance->types->pluck('id')->toArray())) selected @endif>{{ $type->name }}</option>
                    @endforeach
                </select>
                @error('jenis')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="deskripsi" class="block mb-1">Description:</label>
                <textarea name="deskripsi" id="deskripsi" class="rounded-lg py-2 px-3 mb-3 block w-full border-gray-200 border-2 @error('deskripsi') is-invalid @enderror">{{ old('deskripsi', $finance->deskripsi) }}</textarea>
                @error('deskripsi')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="tanggal" class="block mb-1">Date:</label>
                <input type="date" name="tanggal" id="tanggal" value="{{ old('tanggal', $finance->tanggal) }}" class="rounded-lg py-2 px-3 mb-3 block w-full border-gray-200 border-2 @error('tanggal') is-invalid @enderror">
                @error('tanggal')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="py-2 px-4 rounded-lg bg-blue-500 text-white">Update</button>
        </form>
    </section>
@endsection
