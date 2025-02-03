@extends('layouts.application')

{{-- Pass "client" to the layout --}}
@php
    $link = 'client';
@endphp

@section('content')
    <div class="mx-auto max-w-screen-2xl">
        <x-header.upper-part name="Gabbiy" header="Profile" />

        @if (session('status'))
            <div id="success-message" class="bg-green-500 text-white p-4 rounded-md mb-4">
                {{ session('status') }}
            </div>
        @endif

        <div class="h-auto">
            <div class="px-10 pr-32 text-white">
                <div class="w-full flex justify-end items-end mb-4 cursor-pointer"
                    onclick="window.location.assign('{{ route('profile') }}')">
                    <div class="w-fit px-4 py-1 bg-[#f68e12]">Back</div>
                </div>

                {{-- Ensure enctype for file uploads --}}
                <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="grid grid-cols-3 h-80 gap-6 text-black">
                        {{-- Profile Picture Section --}}
                        <div
                            class="col-span-3 px-4 lg:col-span-1 h-fit pb-10 bg-white shadow-md rounded-md pt-10 border border-[#e1e1e1]">
                            <div class="w-full flex justify-center items-center">
                                <img id="profileImage" class="rounded-full w-32 h-32 object-cover"
                                    src="{{ file_exists(public_path($user->image)) && $user->image ? asset($user->image) : asset('/Assets/user-profile-profilepage.png') }}"
                                    alt="Profile Picture">
                            </div>
                            <div class="text-center">
                                <h1>{{ $user->name }}</h1>
                            </div>
                            <div class="text-center">
                                <h1>{{ $user->address }}</h1>
                            </div>

                            {{-- Change Profile & Remove Profile Buttons --}}
                            <div class="flex items-center justify-center gap-2 text-white text-nowrap mt-4">
                                <div id="changeProfileBtn" class="px-4 py-1 bg-[#fa7011] rounded-md cursor-pointer">Change
                                    Profile</div>
                                <div id="removeProfileBtn" class="px-4 py-1 bg-red-500 rounded-md cursor-pointer">Remove
                                    Profile</div>
                            </div>

                            {{-- Hidden File Input (Inside Form) --}}
                            <input type="file" name="image" id="profileImageInput" accept="image/*" class="hidden">
                        </div>

                        {{-- User Information Section --}}
                        <div class="col-span-3 lg:col-span-2 bg-white shadow-md rounded-md p-5 border border-[#e1e1e1]">
                            <div class="text-slate-500">
                                <h1 class="text-sm">User Information</h1>
                            </div>

                            <div class="space-y-2">
                                <div class="h-fit">
                                    <div class="gap-4 items-center">
                                        <div class="flex space-x-2 items-center text-slate-500 font-bold">
                                            <h1>Name</h1>
                                        </div>
                                        <input class="pl-4 col-span-2 w-full border rounded-md py-1 border-[#e1e1e1]"
                                            value="{{ old('name', $user->name) }}" name="name">
                                        @error('name')
                                            <p class="text-sm text-red-700">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="gap-4 items-center">
                                        <div class="flex space-x-2 items-center text-slate-500 font-bold">
                                            <h1>Email</h1>
                                        </div>
                                        <input class="pl-4 col-span-2 w-full border rounded-md py-1 border-[#e1e1e1]"
                                            value="{{ old('email', $user->email) }}" name="email">
                                        @error('email')
                                            <p class="text-sm text-red-700">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="gap-4 items-center">
                                        <div class="flex space-x-2 items-center text-slate-500 font-bold">
                                            <h1>Phone</h1>
                                        </div>
                                        <input class="pl-4 col-span-2 w-full border rounded-md py-1 border-[#e1e1e1]"
                                            value="{{ old('phone', $user->phone) }}" name="phone">
                                        @error('phone')
                                            <p class="text-sm text-red-700">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="gap-4 items-center pb-4">
                                        <div class="flex space-x-2 items-center text-slate-500 font-bold">
                                            <h1>Address</h1>
                                        </div>
                                        <input class="pl-4 col-span-2 w-full border rounded-md py-1 border-[#e1e1e1]"
                                            value="{{ $user->address }}" name="address">
                                        @error('address')
                                            <p class="text-sm text-red-700">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>

                                <hr>

                                {{-- Password Fields --}}
                                <div class="">
                                    <div class="text-slate-500">
                                        <h1 class="text-sm">Password</h1>
                                    </div>
                                    <div class="gap-4 items-center text-slate-500 font-bold">
                                        <div class="flex space-x-2 items-center">
                                            <h1>Current Password</h1>
                                        </div>
                                        <input type="password" name="current_password"
                                            class="pl-4 col-span-2 w-full border rounded-md py-1 border-[#e1e1e1]">
                                        @if (session('errors'))
                                            @if (session('errors')->has('current_password'))
                                                <span
                                                    class="text-red-700">{{ session('errors')->first('current_password') }}</span>
                                            @endif
                                        @endif
                                    </div>
                                    <div class="gap-4 items-center text-slate-500 font-bold">
                                        <div class="flex space-x-2 items-center">
                                            <h1>New Password</h1>
                                        </div>
                                        <input type="password" name="password"
                                            class="pl-4 col-span-2 w-full border rounded-md py-1 border-[#e1e1e1]">
                                        @error('password')
                                            <p class="text-sm text-red-700">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="gap-4 items-center text-slate-500 font-bold">
                                        <div class="flex space-x-2 items-center">
                                            <h1>Confirm Password</h1>
                                        </div>
                                        <input type="password" name="password_confirmation"
                                            class="pl-4 col-span-2 w-full border rounded-md py-1 border-[#e1e1e1]">
                                        @error('password_confirmation')
                                            <p class="text-sm text-red-700">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="pt-4">
                                        <button type="submit"
                                            class="px-4 py-1 bg-[#f68e12] w-fit cursor-pointer text-white">
                                            Save
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>


    <script>
        setTimeout(function() {
            var message = document.getElementById('success-message');
            if (message) {
                message.style.transition = "opacity 0.5s";
                message.style.opacity = "0";
                setTimeout(() => message.style.display = "none", 500); // Wait for fade-out before hiding
            }
        }, 3000); // 3 seconds delay
    </script>

    <script>
        document.getElementById("changeProfileBtn").addEventListener("click", function() {
            document.getElementById("profileImageInput").click(); // Open file selector
        });

        document.getElementById("profileImageInput").addEventListener("change", function(event) {
            let file = event.target.files[0]; // Get selected file
            if (file) {
                let reader = new FileReader();
                reader.onload = function(e) {
                    document.querySelector("img.rounded-full").src = e.target.result; // Update preview
                };
                reader.readAsDataURL(file);
            }
        });

        document.getElementById("removeProfileBtn").addEventListener("click", function() {
            document.getElementById("profileImageInput").value = ""; // Clear input
            document.querySelector("img.rounded-full").src =
            "{{ asset('/Assets/user-profile-profilepage.png') }}"; // Reset to default
        });
    </script>
@endsection
