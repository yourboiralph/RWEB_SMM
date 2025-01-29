<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Client | Dashboard</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="flex">
    {{-- SIDEBAR --}}
    <div class="fixed top-0 left-0 h-screen w-fit bg-white border-r shadow-lg z-10 text-sm">

        {{-- Logo and Hamburger --}}
        <div class="p-6 flex items-center w-fit gap-8">
            <i class="fa-solid fa-bars text-2xl cursor-pointer"></i>
            <img class="w-64" src="/Assets/logo.png" draggable="false" alt="">
        </div>
        <hr class="border border-[#EC690F] mb-10">

        {{-- SIDEBAR MENU --}}
        <div class="mx-6 mb-4">
            <a href="{{ route('client.dashboard') }}"
                class="p-2 flex items-center w-full gap-2 rounded-md 
                {{ request()->is('client/dashboard') ? 'bg-[#f68e12] text-white font-bold' : '' }}"
                style="{{ request()->is('client/dashboard') ? 'box-shadow: 0 1px 10px rgba(0, 0, 0, 0.6);' : '' }}"
                onclick="Navigate('/client/dashboard')">
                <img src="/Assets/icon-dashboard-white.png"
                draggable="false"
                    class="p-2 rounded-lg w-10 h-10 {{ request()->is('client/dashboard') ? 'bg-black' : 'bg-[#f66d11]' }}"
                    alt="Dashboard Icon">
                <h1>Dashboard</h1>
            </a>
        </div>

        <div class="mx-6 mb-4">
            <a href="{{ route('client.projectdev') }}"
                class="p-2 flex items-center w-full gap-2 rounded-md 
                {{ request()->is('client/projectdev') ? 'bg-[#f68e12] text-white font-bold' : '' }}"
                style="{{ request()->is('client/project-development') ? 'box-shadow: 0 1px 10px rgba(0, 0, 0, 0.6);' : '' }}">

                @if (request()->is('client/projectdev'))
                    <img src="/Assets/icon-projdev-dark.png" class="p-2 rounded-lg w-10 h-10 bg-white"
                        alt="Project Development Icon" draggable="false">
                    <h1>Project Development</h1>
                @else
                    <img src="/Assets/icon-projdev-white.png" class="p-2 rounded-lg w-10 h-10 bg-[#f66d11]"
                        alt="Project Development Icon" draggable="false">
                    <h1>Project Development</h1>
                @endif
            </a>
        </div>

        <div class="mx-6 mb-4">
            <a href="{{ route('client.profile') }}"
                class="p-2 flex items-center w-full gap-2 rounded-md 
                {{ request()->is('client/profile') ? 'bg-[#f68e12] text-white font-bold' : '' }}"
                style="{{ request()->is('client/profile') ? 'box-shadow: 0 1px 10px rgba(0, 0, 0, 0.6);' : '' }}">

                @if (request()->is('client/profile'))
                    <img src="/Assets/icon-profile-dark.png" class="p-2 rounded-lg w-10 h-10 bg-white"
                        alt="Profile Icon" draggable="false">
                    <h1>Profile</h1>
                @else
                    <img src="/Assets/icon-profile-white.png" class="p-2 rounded-lg w-10 h-10 bg-[#f66d11]"
                        alt="Profile Icon" draggable="false">
                    <h1>Profile</h1>
                @endif
            </a>
        </div>

        <div class="mx-6 mb-4">
            <a href="{{ route('client.promotions') }}"
                class="p-2 flex items-center w-full gap-2 rounded-md 
                {{ request()->is('client/promotions') ? 'bg-[#f68e12] text-white font-bold' : '' }}"
                style="{{ request()->is('client/promotions') ? 'box-shadow: 0 1px 10px rgba(0, 0, 0, 0.6);' : '' }}">

                @if (request()->is('client/promotions'))
                    <img src="/Assets/icon-promotions-dark.png" class="p-2 rounded-lg w-10 h-10 bg-white"
                        alt="Promotions Icon" draggable="false">
                    <h1>Promotions</h1>
                @else
                    <img src="/Assets/icon-promotions-white.png" class="p-2 rounded-lg w-10 h-10 bg-[#f66d11]"
                        alt="Promotions Icon" draggable="false">
                    <h1>Promotions</h1>
                @endif

            </a>
        </div>
    </div>

    <div class="flex-1 bg-[#ffffff] ml-80">
        <div>
            {{ $slot }}
        </div>


    </div>
    </div>
</body>

</html>
