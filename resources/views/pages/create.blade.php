@extends('layouts.main')
@section('title', 'Create Talk')
@section('content')
    <div class="font-[Poppins] bg-gradient-to-t from-[#fbc2eb] to-[#a6c1ee] h-screen p-20">
        <form method="POST" action="{{ route('talks.save') }}" class="max-w-xl mx-auto">
            @csrf
            <div class="mb-6">
                <label for="value" class="block text-gray-700 text-sm font-bold mb-2">Talk</label>
                <textarea id="value" name="value" placeholder="Write your talk here..." class="w-full border border-gray-300 rounded-md p-5 focus:outline-none focus:border-blue-500 h-40" required></textarea>
                @error('value')
                    <span class="text-red-500">{{ $message }}</span>
                @enderror
            </div>
            <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
            <div class="flex justify-end">
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md">Submit</button>
            </div>
        </form>
    </div>
@endsection
