@extends('layouts.admin')

@section('title', 'User Management')

@section('content')
<div class="font-[Poppins] h-screen bg-gradient-to-t from-[#fbc2eb] to-[#a6c1ee] flex justify-start items-start flex-col"> <!-- Changed justify-right to justify-start -->
    <div class="w-full p-20"> <!-- Ensured the container is full width -->
       
        <!-- Content -->
        <div class="w-4/5 p-8"> <!-- Ensured the content container is full width -->
            <h1 class="text-3xl font-semibold mb-6">User Management</h1>

            <div class="overflow-x-auto">
                <table class="w-full bg-white rounded-xl shadow-md"> <!-- Full width table -->
                    <thead>
                        <tr>
                            <th class="px-6 py-3 bg-gray-100 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">ID</th>
                            <th class="px-6 py-3 bg-gray-100 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Name</th>
                            <th class="px-6 py-3 bg-gray-100 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Username</th>
                            <th class="px-3 py-3 bg-gray-100"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $user)
                            <tr>
                                <td class="px-6 py-4 whitespace-no-wrap">{{ $user->id }}</td>
                                <td class="px-6 py-4 whitespace-no-wrap">{{ $user->name }}</td>
                                <td class="px-6 py-4 whitespace-no-wrap">{{ $user->username }}</td>
                                <td class="px-3 py-4 whitespace-no-wrap">
                                <!-- Delete button with confirmation alert -->
                                    <button type="button" class="bg-red-500 text-white px-4 py-2 rounded-md mt-2 top-2 right-2 group" onclick="confirmDelete('{{ route('admin.users.delete', $user->id) }}')">
                                        Delete User
                                    </button>
                                    
                                    <!-- Form to delete the talk -->
                                    <form id="delete-form-{{ $user->id }}" action="{{ route('admin.users.delete', $user->id) }}" method="POST" class="hidden">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                            
                                </td>
                            </tr>
                        @endforeach
                        @if($users -> isEmpty())
                            <p class="text-gray-800 font-bold"> 
                                No users yet.
                            </p>    
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script>

    // Function to confirm deletion
        function confirmDelete(routeUrl) {
            Swal.fire({
                title: 'Confirm Deletion',
                text: 'Are you sure you want to delete this user?',
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
