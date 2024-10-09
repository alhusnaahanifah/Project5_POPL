<div class="bg-white font-[Poppins]">
    <span class="absolute text-white text-4xl top-5 left-4 cursor-pointer" onclick="Openbar()">
        <i class="bi bi-filter-left px-2 bg-gray-900 rounded-md"></i>
    </span>
    <div class="sidebar fixed top-0 bottom-0 lg:left-0 left-[-300px] duration-1000
                p-2 w-[270px] overflow-y-auto text-center bg-white shadow h-screen">
        <div class="text-gray-100 text-xl">
            <div class="p-2.5 mt-2 flex items-center rounded-md">
                <img class="w-10 h-9 cursor-pointer" src="{{ asset('image/logo_FourTalk.png') }}" alt="F-OurTalk Logo">
                <div class="flex items-center"> 
                    <h1 class="text-xl lg:text-xl text-black font-bold px-4 self-center">F-OURTALK</h1>
                    <i class="bi bi-chevron-left ml-4 cursor-pointer lg:hidden text-black" onclick="Openbar()"></i>
                </div>
            </div>

            <hr class="my-2 text-gray-600">

            <div>
            <a href="/dashboard" class="p-2.5 mt-2 flex items-center rounded-md px-4 duration-300 cursor-pointer hover:bg-gray-200">
                    <i class="bi bi-house-door-fill text-black"></i>
                    <span class="text-[15px] ml-4 text-black">Dashboard</span>
            </a>
                <a href="/users" class="p-2.5 mt-2 flex items-center rounded-md px-4 duration-300 cursor-pointer hover:bg-gray-200">
                    <i class="bi bi-person-fill text-black"></i>
                    <span class="text-[15px] ml-4 text-black">User</span>
            </a>

            <a href="/admintalk" class="p-2.5 mt-2 flex items-center rounded-md px-4 duration-300 cursor-pointer hover:bg-gray-200">
                    <i class="bi bi-envelope-fill text-black"></i>
                    <span class="text-[15px] ml-4 text-black">Talk</span>
            </a>

            <a href="/logout" class="p-2.5 mt-2 flex items-center rounded-md px-4 duration-300 cursor-pointer hover:bg-gray-200">
                    <i class="bi bi-box-arrow-in-right text-black"></i>
                    <span class="text-[15px] ml-4 text-black">Logout</span>
            </a>

            </div>
        </div>
    </div>

    <script>
        function Openbar() {
            document.querySelector('.sidebar').classList.toggle('left-[-300px]');
        }
    </script>
</div>
