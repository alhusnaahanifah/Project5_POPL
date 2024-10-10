@extends('layouts.admin')
@section('title', 'F-Our Talk')
@section('content')
    <style>
        .notifications {
            position: fixed;
            top: 30px;
            margin: auto;
            z-index: 9999; /* Pastikan nilai z-index lebih tinggi daripada sidebar */
            width: 800px;
        }

    </style>
    <div
        class="font-[Poppins] min-h-screen bg-gradient-to-t from-[#fbc2eb] to-[#a6c1ee] p-20">
        <div class="p-20">
            <div class="text-left ml-4 md:ml-100 mt-3">

            
    
        @if (session()->has('success'))
            <div class="notifications bg-green-200 text-green-800 px-4 py-2 rounded-md mb-4 ml-auto">
                {{ session('success') }}
            </div>
        @endif
        @foreach($talks as $talk)
            <div class="inset-0 border-4 border-black mx-60 mb-10 p-10 rounded-2xl">
                <p class="text-gray-800 font-bold"> 
                    <i class="bi bi-person-circle"></i>
                    {{ $talk->user->username }}
                </p>
                <h1>{{ $talk->value }}</h1>
                
                <!-- Tombol untuk menampilkan atau menyembunyikan komentar -->
                <button class="bg-gray-300 text-gray-700 px-4 py-2 rounded-md mt-2 toggle-comments">Show/Hide Comments</button>

                <!-- Tampilkan komentar jika tersedia -->
                @if ($talk->comments && $talk->comments->isNotEmpty())
                    <div class="comments hidden mt-4">
                        @foreach($talk->comments as $comment)
                            <div class="border-2 border-gray-300 rounded-md p-2 mb-2">
                                <p>{{ $comment->user->username }}: {{ $comment->komentar }}</p>
                            </div>
                        @endforeach
                    </div>
                @else
                    <p>No comments yet.</p>
                @endif

                <!-- Delete button with confirmation alert -->
                <button type="button" class="bg-red-500 text-white px-4 py-2 rounded-md mt-2 top-2 right-2 group" onclick="confirmDelete('{{ route('admindelete', ['id' => $talk->id]) }}')">
                    Delete talk
                </button>
                
                <!-- Form to delete the talk -->
                <form id="delete-form-{{ $talk->id }}" action="{{ route('admindelete', ['id' => $talk->id]) }}" method="POST" class="hidden">
                    @csrf
                    @method('DELETE')
                </form>
                
            </div>

        @endforeach

        @if($talks -> isEmpty())
            <div class="inset-0 border-4 border-white mx-60 p-5 rounded-2xl relative">
                <p class="text-gray-800 font-bold"> 
                    No talks yet.
                </p>    
            </div
        @endif
    </div>

    <!-- Script untuk menangani tampilan komentar dan pop-up -->
    <script>
        const toggleButtons = document.querySelectorAll('.toggle-comments');

        toggleButtons.forEach(button => {
            button.addEventListener('click', () => {
                const comments = button.nextElementSibling;
                comments.classList.toggle('hidden');
            });
        });

        // Function to confirm deletion
        function confirmDelete(routeUrl) {
            Swal.fire({
                title: 'Confirm Deletion',
                text: 'Are you sure you want to delete this talk?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#aaa',
                confirmButtonText: 'Yes, delete it',
                cancelButtonText: 'No, cancel'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById(`delete-form-${routeUrl.split('/').pop()}`).submit();
                }
            });
        }
    </script>
@endsection