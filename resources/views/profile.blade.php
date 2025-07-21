@extends('layouts.sidebarLayout')

@section('content')
    <h1 class="text-2xl font-semibold mb-6 pl-12 md:pl-0">Edit Profile</h1>

    <div class="bg-white p-6 rounded-lg shadow-md ring-1 ring-gray-900/5 space-y-4">

        <form action="{{ route('profile.upload') }}" method="POST" enctype="multipart/form-data" id="uploadForm">
            @csrf
            <div class="flex items-center space-x-6 px-3">
                {{-- todo Ambil profile dari google --}}
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
                <img class="size-28 rounded-full object-cover" src="{{ $avatarUrl }}" alt="{{ Auth::user()->name }}">


                <div class="">
                    <input type="file" name="photo" id="photoInput" accept="image/*" class="hidden"
                        onchange="document.getElementById('uploadForm').submit();">

                    <div class="flex items-center gap-3">
                        <button type="button" onclick="document.getElementById('photoInput').click();"
                            class="px-5 py-2 text-md font-medium text-white bg-blue-600 rounded hover:bg-blue-700">
                            Change Foto
                        </button>
                        <p class="text-sm text-gray-500">Max 4MB, JPG/PNG only.</p>
                    </div>
                </div>
            </div>
        </form>

        @if (Auth::user()->avatar)
            <form action="{{ route('profile.delete') }}" method="POST" class="px-6">
                @csrf
                @method('DELETE')
                <button type="submit"
                    class="flex items-center gap-1 text-md font-semibold text-red-500 hover:underline mt-2">
                    Delete Foto
                    <iconify-icon icon="prime:trash" width="24" height="24"></iconify-icon>
                </button>
            </form>
        @endif



        {{-- Informasi Pribadi user  --}}
        <div id="formDisplay" class="border rounded-lg p-4">
            <div class="flex justify-between items-center mb-4">
                <h2 class="text-xl font-medium">Personal Info</h2>
                <button id="editProfile"
                    class="flex items-center gap-2 text-lg font-semibold text-blue-600 border-2 rounded-md px-3 py-2 ">
                    <iconify-icon icon="iconamoon:edit-light" width="24" height="24"></iconify-icon>
                    Edit
                </button>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4 text-sm">
                <div>
                    <p class="text-gray-500 text-lg">Full Name</p>
                    <p class="font-medium text-lg text-gray-800">{{ Auth::user()->name }}</p>
                </div>
                <div>
                    <p class="text-gray-500 text-lg">Email</p>
                    <p class="font-medium text-lg text-gray-800">{{ Auth::user()->email }}</p>
                </div>
                <div>
                    <p class="text-gray-500 text-lg">Phone</p>
                    <p class="font-medium text-gray-800 text-lg">{{ Auth::user()->no_telp }}</p>
                </div>
            </div>
        </div>



        {{-- edit --}}
        <form action="{{ route('profile.update') }}" id="editForm" method="POST" class="hidden mt-6 space-y-4">
            @csrf
            @method('PUT')

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div>
                    <label class="block font-semibold text-gray-700 mb-2">Full Name</label>
                    <input type="text" name="name" value="{{ Auth::user()->name }}"
                        class="w-full border border-blue-500  px-4 py-3 rounded-md shadow-sm">
                </div>
                <div>
                    <label class="block font-semibold text-gray-700 mb-2">Email</label>
                    <input disabled type="email" name="email" value="{{ Auth::user()->email }}"
                        class="w-full border   px-4 py-3 rounded-md shadow-sm">
                </div>
                <div>
                    <label class="block font-semibold text-gray-700 mb-2">Phone</label>
                    <input type="text" name="no_telp" value="{{ Auth::user()->no_telp }}"
                        class="w-full border border-blue-500  px-4 py-3 rounded-md shadow-sm">
                </div>
            </div>

            <div class="flex items-center gap-4 mt-4">
                <button type="submit" class="bg-green-600 text-white px-6 py-2 rounded hover:bg-green-700">
                    Save
                </button>
                <button type="button" class="bg-gray-600 text-white px-4 py-2 rounded hover:bg-gray-700" id="cancelBtn"
                    class="text-gray-500">
                    Cancel
                </button>
            </div>
        </form>

        @push('scripts')
            @vite('resources/js/editProfile.js')
        @endpush




    </div>
@endsection
