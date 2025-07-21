<header class="bg-white z-50 sticky top-0 shadow-md px-6 py-6 flex justify-between items-center">
    <div class="flex items-center gap-4">
        {{-- Hamburger button --}}
        <button @click="sidebarOpen = !sidebarOpen" class="md:hidden">
            <svg class="w-6 h-6 text-gray-700" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
            </svg>
        </button>

        <h1 class="text-xl font-bold">Dashboard</h1>
    </div>

    <div class="flex items-center gap-4">
        <span>{{ Auth::user()->name }}</span>
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="text-red-600 hover:underline">
                <iconify-icon icon="cuida:logout-outline" width="24" height="24"></iconify-icon>
            </button>
        </form>

    </div>
</header>
