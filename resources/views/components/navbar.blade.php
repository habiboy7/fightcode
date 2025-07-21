<nav class="shadow-md sticky top-0 bg-white z-50" x-data="{ isOpen: false }">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 ">
        <div class="flex h-20 items-center justify-between ">
            <div class="flex items-center ">
                <div class="flex items-center">
                    <a href="/"
                        class="flex items-center space-x-2 transform transition-transform duration-300 hover:scale-105">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 161.42 162.683"
                            class="h-10 w-auto fill-current text-teal-600 ">
                            <g id="Fotoklub_x5F_Maribor">
                                <path style="fill-rule:evenodd;clip-rule:evenodd;"
                                    d="M161.154,0.181c0.306,27.189,0.288,54.707,0.238,82.002
                                    c0.02,0.21-0.186,0.196-0.286,0.287c-23.505-0.052-46.148-0.097-69.441-0.096c-3.495,0-7.24-0.044-10.603,0.048
                                    c-0.018,0.062-0.084,0.075-0.096,0.143c-0.152,6.335-0.047,12.896-0.048,19.533c-0.002,19.982,0.127,40.725,0.048,60.416
                                    c-0.786,0.259-1.622,0.143-2.436,0.143c-5.887-0.001-11.947,0-17.91,0c-19.556-0.002-38.665-0.096-58.027-0.095
                                    c-0.778,0-1.618,0.113-2.388-0.143c-0.232-18.775-0.191-37.774-0.19-56.547c0-3.223-0.105-6.139,0.238-8.931
                                    c1.017-8.285,3.852-15.211,7.594-20.823c0.65-0.975,1.233-1.95,1.91-2.817c0.694-0.89,1.411-1.719,2.149-2.579
                                    c1.434-1.672,3.146-3.069,4.871-4.585c6.692-5.876,13.354-11.8,20.06-17.766c13.488-11.791,26.707-23.694,40.26-35.438
                                    c1.716-1.486,3.235-3.124,5.015-4.441c1.807-1.335,3.759-2.473,5.875-3.582c3.05-1.599,6.491-3.029,10.269-3.916
                                    c3.77-0.885,8.578-0.907,13.276-0.907c6.124,0,12.54-0.034,18.817,0c3.045,0.016,6.151,0.145,9.265,0
                                    c5.319-0.247,10.776,0.138,16.143-0.048c0.758-0.026,1.659,0.048,2.578,0.048C159.359,0.086,160.486,0.015,161.154,0.181z
                                    M130.683,10.497c-7.409,0-15.249,0-22.304,0c-2.577,0-4.899,0.013-7.067,0.382c-6.354,1.081-11.043,3.936-14.424,8.023
                                    c-2.351,2.644-4.152,5.758-5.254,9.695c-1.124,4.021-0.812,8.725-0.812,13.85c0,9.89-0.045,20.113,0.144,29.658
                                    c17.706,0.217,35.32,0.191,53.061,0.191c4.434,0,8.874-0.047,13.182-0.048c1.416,0,2.832,0.178,4.202-0.096
                                    c0.25-0.569,0.144-1.219,0.144-1.815c0-9.914-0.049-18.941-0.048-28.798c0-8.975-0.136-18.259-0.048-27.223
                                    c0.012-1.26,0.004-2.537-0.19-3.773C144.528,10.338,137.569,10.497,130.683,10.497z" />
                            </g>
                        </svg>
                        <h3 class="text-2xl text-black font-semibold ">
                            FightCode
                        </h3>
                    </a>
                </div>



                <div class="hidden md:block ml-32">
                    <div class="ml-10 flex items-baseline space-x-8">
                        <a href="{{ route('Learning Path') }}"
                            class="rounded-md hover:bg-[#E9E9E9] px-6 py-3 text-md font-semibold text-black {{ request()->routeIs('Learning Path') ? 'bg-green-100 text-green-600' : '' }}">Learning
                            Path</a>
                        <a href="{{ route('dampak') }}"
                            class="rounded-md px-6 py-3 text-md font-semibold text-black hover:bg-[#E9E9E9] hover:text-black {{ request()->routeIs('dampak') ? 'bg-green-100 text-green-600' : '' }}">Dampak
                            Kami</a>
                        <a href="{{ route('lainnya') }}"
                            class="rounded-md px-6 py-3 text-md font-semibold text-black hover:bg-[#E9E9E9] hover:text-black {{ request()->routeIs('lainnya') ? 'bg-green-100 text-green-600' : '' }}">Lainnya</a>
                    </div>
                </div>
            </div>
            <div class="hidden md:block">
                <div class="ml-4 flex items-center md:ml-6">

                    <!-- Profile dropdownya -->
                    @auth
                        <!-- Kalau sudah login -->
                        <p class="text-md ">{{ Auth::user()->name }}</p>
                        <div class="relative ml-3" x-data="{ isOpen: false }">
                            <div>
                                <button @click="isOpen = !isOpen"
                                    class="relative flex max-w-xs items-center rounded-full bg-gray-800 text-sm focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800">
                                    <span class="sr-only">Open user menu</span>

                                    {{-- ? Ambil profile dari google --}}
                                    @php
                                        $avatar = Auth::user()->avatar;
                                        $avatarUrl = Str::startsWith($avatar, 'http')
                                            ? $avatar
                                            : ($avatar
                                                ? asset('storage/avatar/' . $avatar)
                                                : 'https://ui-avatars.com/api/?name=' .
                                                    urlencode(Auth::user()->name) .
                                                    '&size=128&background=0D8ABC&color=fff');
                                    @endphp
                                    <img class="size-12 rounded-full object-cover" src="{{ $avatarUrl }}"
                                        alt="{{ Auth::user()->name }}">


                                </button>
                            </div>

                            <div x-show="isOpen" x-cloak @click.outside="isOpen = false"
                                x-transition:enter="transition ease-out duration-100 transform"
                                x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100"
                                x-transition:leave="transition ease-in duration-75 transform"
                                x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-95"
                                class="absolute right-0 z-10 mt-2 w-48 origin-top-right rounded-md bg-white py-1 shadow-lg ring-1 ring-black/5"
                                role="menu" aria-orientation="vertical">

                                @php
                                    $user = Auth::user();
                                @endphp


                                <a href="{{ $user->role === 'admin' ? route('admin.dashboard') : route('my-course') }}"
                                    class="flex items-center gap-4 block px-4 py-2 text-sm font-semibold text-gray-700 hover:bg-gray-100">
                                    <iconify-icon icon="mage:dashboard-bar-notification" width="24"
                                        height="24"></iconify-icon>
                                    {{ $user->role === 'admin' ? 'Dashboard Admin' : 'Dashboard' }}
                                </a>

                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit"
                                        class=" flex items-center gap-4 block w-full text-left px-4 py-2 text-sm font-semibold text-gray-700 hover:bg-gray-100">
                                        <iconify-icon icon="mage:logout" width="24" height="24"></iconify-icon>
                                        Logout
                                    </button>
                                </form>
                            </div>
                        </div>
                    @else
                        <!-- Kalau belum login -->
                        <div class="flex items-center gap-2">
                            <a href="{{ route('login') }}"
                                class="text-md px-4 py-2 font-semibold text-black hover:text-blue-800 border border-black transition">Masuk</a>
                            <a href="{{ route('register') }}"
                                class="text-md font-semibold ml-2 text-white px-4 py-2 bg-[#129990] hover:bg-teal-500 transition">Daftar</a>
                        </div>
                    @endauth

                </div>
            </div>


            <div class="-mr-2 flex md:hidden">
                <!-- Mobile menu button -->
                <button type="button" @click="isOpen = !isOpen"
                    class="relative inline-flex items-center justify-center rounded-md bg-gray-600 p-2 text-gray-400 hover:bg-gray-700 hover:text-white focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800 focus:outline-hidden"
                    aria-controls="mobile-menu" aria-expanded="false">
                    <span class="absolute -inset-0.5"></span>
                    <span class="sr-only">Open main menu</span>
                    <!-- Menu open: "hidden", Menu closed: "block" -->
                    <svg :class="{ 'hidden': isOpen, 'block': !isOpen }" class="block size-6" fill="none"
                        viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true"
                        data-slot="icon">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                    </svg>
                    <!-- Menu open: "block", Menu closed: "hidden" -->
                    <svg :class="{ 'block': isOpen, 'hidden': !isOpen }" class="hidden size-6" fill="none"
                        viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true"
                        data-slot="icon">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Mobile menu, show/hide based on menu state. -->
    <div x-show="isOpen" class="md:hidden" id="mobile-menu">
        <div class="space-y-1 px-2 pt-2 pb-3 sm:px-3">
            <a href="{{ route('Learning Path') }}" class="block rounded-md text-black px-3 py-2 text-base font-medium {{ request()->routeIs('Learning Path') ? 'bg-green-100 text-green-600' : '' }}">Learning Path</a>
            <a href="{{ route('dampak') }}"
                class="block rounded-md px-3 py-2 text-base font-medium text-black hover:bg-gray-700 {{ request()->routeIs('dampak') ? 'bg-green-100 text-green-600' : '' }}">Dampak Kami</a>
            <a href="{{ route('lainnya') }}"
                class="block rounded-md px-3 py-2 text-base font-medium text-black hover:bg-gray-700 {{ request()->routeIs('lainnya') ? 'bg-green-100 text-green-600' : '' }} ">Lainnya</a>
        </div>

        @auth
            <div class="border-t border-gray-700 pt-4 pb-3">
                <div class="flex items-center px-5">
                    <div class="shrink-0">
                        @php
                            $user = Auth::user();
                            $avatar =
                                $user && $user->avatar
                                    ? (Str::startsWith($user->avatar, 'http')
                                        ? $user->avatar
                                        : asset('storage/avatar/' . $user->avatar))
                                    : 'https://ui-avatars.com/api/?name=' .
                                        urlencode($user->name ?? 'Guest') .
                                        '&size=128&background=0D8ABC&color=fff';
                        @endphp
                        <img class="size-12 rounded-full object-cover" src="{{ $avatar }}"
                            alt="{{ $user->name ?? 'Guest' }}">

                    </div>
                    <div class="ml-3">
                        <div class="text-base/5 font-medium ">{{ $user->name ?? 'Guest' }}</div>
                    </div>
                </div>
                <div class="mt-3 space-y-1 px-2">

                    <a href="{{ $user->role === 'admin' ? route('admin.dashboard') : route('my-course') }}"
                        class="block rounded-md px-3 py-2 text-base font-medium text-black hover:bg-gray-700 hover:text-white">
                        {{ $user->role === 'admin' ? 'Dashboard Admin' : 'Dashboard' }}
                    </a>
                    <a href="{{ route('logout') }}"
                        class="block rounded-md px-3 py-2 text-base font-medium text-black hover:bg-gray-700 hover:text-white">Sign
                        out</a>
                </div>
            </div>
        @endauth
    </div>
</nav>
