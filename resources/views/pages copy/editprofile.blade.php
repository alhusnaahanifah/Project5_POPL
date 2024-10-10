@extends('layouts.main')
@section('title', 'F-Our Talk')
@section('content')
    <div class="font-[Poppins] bg-gradient-to-t from-[#fbc2eb] to-[#a6c1ee] min-h-screen p-20">
        <div class="border-4 border-white p-3 rounded-xl">
            <div class="flex justify-center text-4xl">
                <h1>Edit Profile</h1>
            </div>
            <form action="" method="POST">
                @csrf
                <div class="inset-0  mx-40 mb-5">
                    <h1>Nama:</h1>
                    <div class="inset-0 border-4 border-black rounded-xl p-2">
                        <input class="bg-transparent ml-3 w-11/12" id="name" type="text" name="name"
                            value="{{ Auth::user()->name }}" required autofocus>
                        @error('name')
                            <span class="error-message">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="inset-0  mx-40 mb-5">
                    <h1>Username:</h1>
                    <div class="inset-0 border-4 border-black rounded-xl p-2">
                        <input class="bg-transparent ml-3 w-11/12" id="username" type="text" name="username"
                            value="{{ Auth::user()->username }}" required>
                        @error('username')
                            <span class="error-message">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="inset-0 mx-40 mb-5">
                    <h1>Current Password:</h1>
                    <div class="inset-0 border-4 border-black rounded-xl p-2">
                        <input class="bg-transparent ml-3 w-11/12" id="old_password" type="password" name="old_password" required>
                    </div>
                    @error('old_password')
                        <span style="display: block; color: red; font-size: 0.875rem; margin-top: 0.25rem;">{{ $message }}</span>
                    @enderror
                </div>

                <div class="inset-0  mx-40 mb-5">
                    <h1>New Password:</h1>
                    <div class="inset-0 border-4 border-black rounded-xl p-2">
                        <input class="bg-transparent ml-3 w-11/12" id="password" type="password" name="password" required>
                    </div>
                </div>
                <div class="inset-0  mx-40 mb-5">
                    <h1>Confirm Password:</h1>
                    <div class="inset-0 border-4 border-black rounded-xl p-2">
                        <input class="bg-transparent ml-3 w-11/12" id="password_confirmation" type="password"
                            name="password_confirmation" required>
                    </div>
                </div>
                <div class="inset-0  mx-40 mb-5">
                    @error('password')
                        <span class="error-message">{{ $message }}</span>
                    @enderror
                </div>
                <div class="flex justify-end mr-40 gap-3">
                    <!-- Tombol Cancel -->
                    <a href="{{ route('profile') }}"
                        class="px-5 py-1 bg-red-300 rounded-md text-black text-lg shadow-md">Cancel</a>
                    <button class="px-5 py-1 bg-green-200 rounded-md text-black text-lg shadow-md">Update</button>
                </div>
            </form>
        </div>
    </div>
@endsection
