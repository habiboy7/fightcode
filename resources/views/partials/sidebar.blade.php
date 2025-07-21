<aside class="w-64 bg-white shadow-md h-screen fixed top-0 left-0 z-30 transform transition-transform duration-300"
    :class="{ '-translate-x-full': !sidebarOpen, 'translate-x-0': sidebarOpen }" x-cloak>
    <div class=" px-3 py-3 text-2xl text-center font-bold border-b">
        <a href="{{ route('home') }}" class="flex items-center gap-3">
            <iconify-icon icon="ei:arrow-left" width="50" height="50"></iconify-icon>
            FightCode
        </a>
    </div>
    <nav class="mt-4 space-y-2 text-gray-800  text-md">
        <a href="{{ route('admin.dashboard') }}"
            class="flex items-center gap-2 block px-4 py-3 hover:bg-gray-200 {{ request()->routeIs('admin.dashboard') ? 'bg-blue-100 text-blue-600' : '' }} ">
            <iconify-icon icon="mage:dashboard-bar-notification" width="28" height="28"></iconify-icon>
            Dashboard
        </a>
        <a href="{{ route('admin.users.index') }}" class="flex items-center gap-2 block px-4 py-3 hover:bg-gray-200 {{ request()->routeIs('admin.users.*') ? 'bg-blue-100 text-blue-600' : '' }}">
            <iconify-icon icon="mage:scan-user" width="28" height="28"></iconify-icon>
            Manage Users
        </a>
        <a href="{{ route('admin.courses.index') }}" class="flex items-center gap-2 block px-4 py-3 hover:bg-gray-200 {{ request()->routeIs('admin.courses.*') ? 'bg-blue-100 text-blue-600' : '' }}">
            <iconify-icon icon="hugeicons:course" width="28" height="28"></iconify-icon>
            Manage Courses
        </a>
        <a href="{{ route('admin.testimonials.index') }}" class="flex items-center gap-2 block px-4 py-3 hover:bg-gray-200 {{ request()->routeIs('admin.testimonials.index') ? 'bg-blue-100 text-blue-600' : '' }} ">
            <iconify-icon icon="majesticons:chat-status-line" width="28" height="28"></iconify-icon>
            Manage Testimoni
        </a>
        <!-- menu lainnya -->
    </nav>
</aside>

{{-- {{ route('admin.users.index') }} --}}
{{-- {{ route('admin.courses.index') }}
{{ route('admin.contents.index') }}
{{ route('admin.testimonials.index') }} --}}
