@extends('layouts.main')
@section('title', 'F-Our Talk')
@section('content')
    <div class="font-[Poppins] bg-gradient-to-t from-[#fbc2eb] to-[#a6c1ee] min-h-screen p-20">
        @if (session()->has('success'))
            <div class="bg-green-200 text-green-800 px-4 py-2 rounded-md mb-4">
                {{ session('success') }}
            </div>
        @endif
        @foreach($talks as $talk)
            <div class="inset-0 border-4 border-white mx-60 p-5 rounded-2xl relative">
                <p class="text-gray-800 font-bold"> 
                    <i class="bi bi-person-circle"></i>
                    {{ $talk->user->username }}
                </p>
                <h1 class="font-semibold mt-3">{{ $talk->value }}</h1>

                <button type="button" class="bg-gray-300 text-gray-700 px-4 py-2 mt-5 rounded-md toggle-comments">Show/Hide the comments</button>

                <!-- Display comments if available, hidden by default -->
                <div class="comments hidden mt-4">
                    @if ($talk->comments && $talk->comments->isNotEmpty())
                        @foreach($talk->comments as $comment)
                            <div class="border-2 border-gray-300 rounded-md p-2 mb-2">
                                <p class="text-gray-600">{{ $comment->user->username }}: <span class="text-black">{{ $comment->komentar }}</span></p>
                            </div>
                        @endforeach
                    @else
                        <p>No comments yet.</p>
                    @endif
                </div>
            </div>
            <div class="inset-0 mx-60 p-2 mb-10 rounded-2xl relative">
                
                <!-- Form untuk menambahkan komentar -->
                <form id="commentForm{{ $talk->id }}" action="{{ route('comments.store', ['talk' => $talk->id, 'user' => Auth::user()->id]) }}" method="POST" class="mt-4">
                    @csrf
                    <div class="flex items-center">
                        <textarea name="komentar" placeholder="Write your comment here..." class="w-full border-2 border-gray-300 rounded-md p-1 bg-opacity-50 bg-white mr-2"></textarea>
                        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md">
                            <i class="bi bi-send"></i> 
                        </button>
                    </div>
                </form>
            </div>
        @endforeach

        <a href="{{ route('talks.create') }}" class="bg-blue-500 text-white text-lg rounded-full w-16 h-16 fixed bottom-10 right-20 flex items-center justify-center group">
            <i class="bi bi-pen"></i>
            <span class="absolute w-32 bg-blue-500 text-white text-sm rounded-md px-2 py-1 bottom-16 right-1/2 transform translate-x-1/2 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                Add New Talk
            </span>
        </a>

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

        // Menangani pop-up setelah submit form
document.addEventListener('DOMContentLoaded', () => {
    const forms = document.querySelectorAll('form');
    forms.forEach(form => {
        form.addEventListener('submit', (event) => {
            event.preventDefault(); // Mencegah pengiriman form secara default
            const formData = new FormData(form);
            const talkId = form.getAttribute('id').replace('commentForm', '');
            
            fetch(form.getAttribute('action'), {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                const successMessage = document.createElement('div');
                successMessage.textContent = data.message;
                successMessage.classList.add('bg-green-200', 'text-green-800', 'px-4', 'py-2', 'rounded-md', 'mb-4');
                form.insertAdjacentElement('afterend', successMessage);
                setTimeout(() => {
                    successMessage.remove();
                    // Memuat ulang halaman setelah menampilkan pesan sukses
                    window.location.reload();
                }, 3000);
                form.reset(); // Mengosongkan form setelah komentar berhasil ditambahkan
            })
            .catch(error => {
                console.error('Error:', error);
            });
        });
    });
});

    </script>
@endsection
