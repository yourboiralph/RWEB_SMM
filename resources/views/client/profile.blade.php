@extends('layouts.application')

{{-- Pass "client" to the layout --}}
@php
    $link = 'client';
@endphp

@section('content')
    <div class="mx-auto max-w-screen-2xl">
        {{-- UPPER PART --}}
        <x-header.upper-part header="Profile" />

        {{-- Middle Part --}}
        <div class="grid px-10 mt-10 grid-cols-3 h-80 gap-6 md:pr-32 text-black">
            <div class="px-10 col-span-3 lg:col-span-1 bg-white shadow-md rounded-md pt-10">
                <div class="w-full flex justify-center items-center">
                    <img class="rounded-full w-32 h-32 object-cover"
                        src="{{ file_exists(public_path($user->image)) && $user->image ? asset($user->image) : asset('/Assets/user-profile-profilepage.png') }}"
                        alt="User Image">
                </div>
                <div class="text-center mt-4">
                    <h1 class="font-semibold">{{ $user->name }}</h1>
                </div>
                <div class="text-center">
                    <h1 class="text-gray-500">{{ $user->address }}</h1>
                </div>
            </div>

            <div class="col-span-3 lg:col-span-2 bg-white shadow-md rounded-md p-5">
                <div class="flex justify-between">
                    <h1 class="text-sm font-semibold">User Information</h1>
                    <div class="px-4 py-1 bg-[#f68e12] cursor-pointer text-white rounded-md hover:bg-[#e57f0f]"
                        onclick="window.location.assign('{{ route('profile.edit') }}')">Edit</div>
                </div>
                <div class="space-y-4 mt-4">
                    <div>
                        <div class="flex space-x-2 items-center">
                            <img src="/Assets/name.png" class="w-5 h-5" alt="">
                            <h1 class="font-medium">Name</h1>
                        </div>
                        <p class="pl-7 text-gray-700">{{ $user->name }}</p>
                    </div>
                    <div>
                        <div class="flex space-x-2 items-center">
                            <img src="/Assets/email.png" class="w-5 h-5" alt="">
                            <h1 class="font-medium">Email</h1>
                        </div>
                        <p class="pl-7 text-gray-700">{{ $user->email }}</p>
                    </div>
                    <div>
                        <div class="flex space-x-2 items-center">
                            <img src="/Assets/phone-number.png" class="w-5 h-5" alt="">
                            <h1 class="font-medium">Phone</h1>
                        </div>
                        <p class="pl-7 text-gray-700">{{ $user->phone }}</p>
                    </div>
                    <div>
                        <div class="flex space-x-2 items-center">
                            <img src="/Assets/address.png" class="w-5 h-5" alt="">
                            <h1 class="font-medium">Address</h1>
                        </div>
                        <p class="pl-7 text-gray-700">{{ $user->address }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
