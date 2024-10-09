@extends('layouts.admin')
@section('title', 'Admin F-OurTalk')
@section('content')
    <div class="font-[Poppins] w-full min-h-screen bg-gradient-to-t from-[#fbc2eb] to-[#a6c1ee] flex justify-start items-start flex-col">
        <div class="p-20">
            <div class="text-left ml-4 md:ml-30 mt-3">
                <h1 class="text-2xl md:text-4xl font-semibold">Dashboard</h1>
            </div>
            <div class="relative p-70 top-[70px]">
            <a href="{{ route('users.index') }}">
                <div
                    class="flex flex-col px-6 py-6 overflow-hidden bg-white hover:bg-gradient-to-br hover:from-purple-400 hover:via-blue-400 hover:to-blue-500 rounded-xl shadow-lg duration-300 hover:shadow-2xl group">
                    <div class="relative w-full h-full px-4 sm:px-6 lg:px-8 flex items-center">
                        <div>
                            <div class="flex items-center justify-between">
                                <div class="text-green-500 text-lg flex space-x-2 items-center mr-52">
                                    <div class="bg-gray-200 rounded-md p-2 flex items-center">
                                        <i class="fas fa-toggle-off fa-sm text-green-300"></i>
                                    </div>
                                    <p>Noticed</p>
                                </div>
                                <div class="px-4 py-4 bg-gray-300 rounded-xl bg-opacity-70">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 group-hover:text-gray-50"
                                        viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </div>
                            </div>
                            <h1 class="xl:text-5xl font-bold text-gray-700 mt-5 group-hover:text-gray-50">
                                {{ $totalUsers }}
                            </h1>
                            <div class="flex items-center justify-between">
                                <h3 class="text-black text-lg mt-2 text-gray-600 ">
                                    Total User
                                </h3>
                                <span style="margin-left: auto;">
                                    <svg xmlns="http://www.w3.org/2000/svg"
                                        class="h-7 w-6 text-indigo-600 group-hover:text-gray-200" viewBox="0 0 20 20"
                                        fill="currentColor">
                                        <path fill-rule="evenodd"
                                            d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-8-3a1 1 0 00-.867.5 1 1 0 11-1.731-1A3 3 0 0113 8a3.001 3.001 0 01-2 2.83V11a1 1 0 11-2 0v-1a1 1 0 011-1 1 1 0 100-2zm0 8a1 1 0 100-2 1 1 0 000 2z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="relative p-70 top-[-208px] right-[-550px]">
                <a href="{{ route('admintalk') }}">
                    <div
                        class="flex flex-col px-6 py-6 overflow-hidden bg-white hover:bg-gradient-to-br hover:from-purple-400 hover:via-blue-400 hover:to-blue-500 rounded-xl shadow-lg duration-300 hover:shadow-2xl group">
                        <div class="relative w-full h-full px-4 sm:px-6 lg:px-8 flex items-center">
                            <div>
                                <div class="flex items-center justify-between">
                                    <div class="text-green-500 text-lg flex space-x-2 items-center mr-52">
                                        <div class="bg-gray-200 rounded-md p-2 flex items-center">
                                            <i class="fas fa-toggle-off fa-sm text-green-300"></i>
                                        </div>
                                        <p>Noticed</p>
                                    </div>
                                    <div class="px-4 py-4 bg-gray-300  rounded-xl bg-opacity-30">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 group-hover:text-gray-50"
                                            viewBox="0 0 20 20" fill="currentColor">
                                            <path d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z" />
                                            <path fill-rule="evenodd"
                                                d="M4 5a2 2 0 012-2 3 3 0 003 3h2a3 3 0 003-3 2 2 0 012 2v11a2 2 0 01-2 2H6a2 2 0 01-2-2V5zm3 4a1 1 0 000 2h.01a1 1 0 100-2H7zm3 0a1 1 0 000 2h3a1 1 0 100-2h-3zm-3 4a1 1 0 100 2h.01a1 1 0 100-2H7zm3 0a1 1 0 100 2h3a1 1 0 100-2h-3z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                </div>
                                <h1 class="xl:text-5xl font-bold text-gray-700 mt-5 group-hover:text-gray-50">
                                    {{ $totalTalks }}
                                </h1>
                                <div class="flex items-center justify-between">
                                    <h3 class="text-black text-lg mt-2 text-gray-600 ">
                                        Total Talk
                                    </h3>
                                    <span style="margin-left: auto;">
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            class="h-7 w-6 text-indigo-600 group-hover:text-gray-200" viewBox="0 0 20 20"
                                            fill="currentColor">
                                            <path fill-rule="evenodd"
                                                d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-8-3a1 1 0 00-.867.5 1 1 0 11-1.731-1A3 3 0 0113 8a3.001 3.001 0 01-2 2.83V11a1 1 0 11-2 0v-1a1 1 0 011-1 1 1 0 100-2zm0 8a1 1 0 100-2 1 1 0 000 2z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
@endsection
