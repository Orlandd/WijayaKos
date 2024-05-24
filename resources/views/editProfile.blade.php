@extends('layouts.app')

@section('content')
    <main class="m-4 flex-grow md:m-10 flex flex-col items-center justify-center px-6 py-5 bg-white">
        <div class="w-full max-w-md">
            <h2 class="text-2xl text-gray-600 font-bold text-center my-5">Edit Profile</h2>
            <form action="#" method="POST" class="bg-white shadow-md rounded-lg px-8 pt-6 pb-8 mb-4"
                enctype="multipart/form-data">
                <!-- <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="banner">
                        Banner Image
                    </label>
                    <input class="shadow appearance-none border rounded-lg w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="banner" type="file" accept="image/*">
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="profile">
                        Profile Image
                    </label>
                    <input class="shadow appearance-none border rounded-lg w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="profile" type="file" accept="image/*">
                </div> -->
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="banner">
                        Banner Image
                    </label>
                    <div class="relative">
                        <input class="hidden" id="banner" type="file" accept="image/*">
                        <button type="button"
                            class="bg-gray-400 text-white px-4 py-1.5 rounded-lg hover:bg-gray-500 focus:outline-none focus:shadow-outline"
                            onclick="document.getElementById('banner').click()">Choose File</button>
                        <span id="banner-filename" class="ml-3 text-gray-700">No file chosen</span>
                    </div>
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="profile">
                        Profile Image
                    </label>
                    <div class="relative">
                        <input class="hidden" id="profile" type="file" accept="image/*">
                        <button type="button"
                            class="bg-gray-400 text-white px-4 py-1.5 rounded-lg hover:bg-gray-500 focus:outline-none focus:shadow-outline"
                            onclick="document.getElementById('profile').click()">Choose File</button>
                        <span id="profile-filename" class="ml-3 text-gray-700">No file chosen</span>
                    </div>
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="username">
                        Full Name
                    </label>
                    <input
                        class="shadow appearance-none border rounded-lg w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        id="username" type="text" placeholder="Full Name">
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="email">
                        Email
                    </label>
                    <input
                        class="shadow appearance-none border rounded-lg w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        id="email" type="email" placeholder="Email">
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="phone">
                        Phone Number
                    </label>
                    <input
                        class="shadow appearance-none border rounded-lg w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        id="phone" type="tel" placeholder="Phone Number">
                </div>
                <div class="mb-6">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="address">
                        Address
                    </label>
                    <input
                        class="shadow appearance-none border rounded-lg w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        id="address" type="text" placeholder="Address">
                </div>
                <div class="flex items-center justify-between">
                    <button
                        class="bg-teal-500 hover:bg-teal-700 mx-auto text-white font-bold py-2 px-4 rounded-lg focus:outline-none focus:shadow-outline"
                        type="submit">
                        Save
                    </button>
                </div>
            </form>
        </div>
    </main>
@endsection
