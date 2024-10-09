@extends('layouts.main')
@section('title', 'F-Our Talk')
@section('content')
    <div class="font-[Poppins] bg-gradient-to-t from-[#fbc2eb] to-[#a6c1ee] min-h-screen p-20">
        <div class="border-4 border-white p-3 rounded-xl">
            <div class="flex justify-center">
                <div class="bg-white rounded-full p-10 flex items-center justify-center">
                    <i class="bi bi-person-fill text-4xl "></i>
                </div>
            </div>
            <div class="flex justify-center text-4xl">
                <h1>{{ Auth::user()->username }}</h1>
            </div>
            <div class="inset-0  mx-40 mb-5">
                <h1>Nama:</h1>
                <div class="inset-0 border-4 border-black rounded-xl p-2">
                    <h1 class="ml-3">{{ Auth::user()->name }}</h1>
                </div>
            </div>
            <div class="inset-0  mx-40 mb-5">
                <h1>Username:</h1>
                <div class="inset-0 border-4 border-black rounded-xl p-2">
                    <h1 class="ml-3">{{ Auth::user()->username }}</h1>
                </div>
            </div>
            <div class="inset-0  mx-40 mb-5">
                <h1>Password:</h1>
                <div class="inset-0 border-4 border-black rounded-xl p-2">
                    <input type="password" class="bg-transparent ml-3" value="{{ Auth::user()->password }}" readonly>
                </div>
            </div>
            <!-- Tombol yang akan memicu modal -->
            <div class="flex justify-end">
            <a href="{{ route('editprofile') }}"
                class="bg-blue-500 text-white text-lg rounded-full w-16 h-16 flex items-center justify-center"
                data-bs-toggle="modal" data-bs-target="#exampleModal">
                <i class="bi bi-pen"></i>
            </a>
            </div>
        </div>
    </div>
@endsection
