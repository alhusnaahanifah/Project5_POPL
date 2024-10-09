<div>
    <header class="bg-white">
        <nav class="flex justify-between items-center w-[92%]  mx-auto p-4">
            <div class="flex items-center">
                <img class="w-16 cursor-pointer" src="{{ asset('image/logo_FourTalk.png') }}" alt="...">
                <span class="ml-2 text-lg font-semibold text-brown-800">F-OUR TALK</span>
            </div>
            <div
                class="nav-links duration-500 md:static absolute bg-white md:min-h-fit min-h-[60vh] left-0 top-[-100%] md:w-auto  w-full flex items-center px-5">
                <ul class="flex md:flex-row flex-col md:items-center md:gap-[4vw] gap-8">
                    <li>
                        <a class="text-lg font-semibold text-brown-800 hover:text-blue-300" href="{{ route('home') }}">Our Talk</a>
                    </li>
                    <li>
                        <a class="text-lg font-semibold text-brown-800 hover:text-blue-300" href="{{ route('mytalks') }}">My Talk</a>
                    </li>
                </ul>
            </div>
            
            <div class="relative inline-block text-left">
          <div>
            <button type="button" class="inline-flex w-full justify-center gap-x-1.5 rounded-md bg-white px-3 py-2 text-lg font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-blue-300" id="menu-button" aria-expanded="false" aria-haspopup="true" onclick="toggleMenu()">
              <i class="bi bi-person-circle"></i>
              Hi,  {{ Auth::user()->username }}!
              <svg class="-mr-1 h-5 w-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                <path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06.02L10 11.168l3.71-3.938a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z" clip-rule="evenodd" />
              </svg>
            </button>
          </div>

          <!-- Dropdown menu, show/hide based on menu state -->
          <div id="dropdown-menu" class="absolute right-0 z-10 mt-2 w-56 origin-top-right rounded-md bg-white shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none hidden" role="menu" aria-orientation="vertical" aria-labelledby="menu-button" tabindex="-1">
            <div class="py-1" role="none">
              <!-- Active: "bg-gray-100 text-gray-900", Not Active: "text-gray-700" -->
              <a href="{{ route('profile') }}" class="text-gray-700 block px-4 py-2 text-sm" role="menuitem" tabindex="-1" id="menu-item-0">
              <i class="bi bi-person-fill"></i>
              Profil</a>
              <form method="GET" action="{{ route('logout') }}">
                <a href="{{ route('logout') }}" id="logout-link" class="text-gray-700 block w-full px-4 py-2 text-left text-sm" role="menuitem" tabindex="-1" id="menu-item-3">
                  <i class="bi bi-box-arrow-in-right"></i>
                    Logout
                </a>

              </form>
            </div>
          </div>
        </div>


    </header>

    <script>
        const navLinks = document.querySelector('.nav-links')
        function onToggleMenu(e){
            e.name = e.name === 'menu' ? 'close' : 'menu'
            navLinks.classList.toggle('top-[9%]')
        }

        function toggleMenu() {
          var menu = document.getElementById("dropdown-menu");
          var button = document.getElementById("menu-button");
          var expanded = button.getAttribute("aria-expanded");

          if (expanded === "true") {
            menu.classList.add("hidden");
            button.setAttribute("aria-expanded", "false");
          } else {
            menu.classList.remove("hidden");
            button.setAttribute("aria-expanded", "true");
          }
        }
    </script>
</div>
