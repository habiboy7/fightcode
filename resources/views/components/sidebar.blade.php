<div class="w-80 h-screen bg-white border-r">
    <div class="flex items-center justify-center h-20 border-b pl-14 md:pl-0">
        <a href="{{ route('home') }}" class="flex items-center gap-2 text-xl font-bold text-green-700">
            <iconify-icon icon="mingcute:arrow-left-line" width="26" height="26"></iconify-icon>
            FightCode Academy
        </a>
    </div>


    <nav class="px-4 py-6 space-y-2 text-sm text-gray-700">
        <div>
            <a href="{{ route('my-course') }}"
                class="flex items-center gap-2 px-4 py-2 rounded-lg hover:bg-green-50 text-lg font-medium {{ request()->is('my-course') ? 'bg-green-100 text-green-600' : '' }}">
                <iconify-icon icon="hugeicons:course" width="24" height="24"></iconify-icon>
                My Course
            </a>
            <a href="{{ route('profile') }}"
                class="flex items-center gap-2 px-4 py-2 rounded-lg hover:bg-green-50 text-lg font-medium {{ request()->is('profile') ? 'bg-green-100 text-green-600' : '' }}">
                <iconify-icon icon="codicon:account" width="24" height="24"></iconify-icon>
                Profile
            </a>
            <a href="{{ route('settings') }}"
                class="flex items-center gap-2 px-4 py-2 rounded-lg hover:bg-green-50 text-lg font-medium {{ request()->is('settings') ? 'bg-green-100 text-green-600' : '' }}">
                <iconify-icon icon="fluent:settings-28-regular" width="25" height="25"></iconify-icon>
                Settings
            </a>
        </div>
    </nav>
</div>
