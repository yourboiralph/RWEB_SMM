{{-- SIDEBAR MENU --}}
@props(['link' => ''])

<div class="mx-6 mb-4">
    <a href="{{ route("{$link}.dashboard") }}"
        class="p-2 flex items-center w-full gap-2 rounded-md 
        {{ request()->is("{$link}/dashboard") ? 'bg-[#f68e12] text-white font-bold' : '' }}"
        style="{{ request()->is("{$link}/dashboard") ? 'box-shadow: 0 1px 10px rgba(0, 0, 0, 0.6);' : '' }}">
        <img src="/Assets/icon-dashboard-white.png"
            draggable="false"
            class="p-2 rounded-lg w-10 h-10 {{ request()->is("{$link}/dashboard") ? 'bg-black' : 'bg-[#f66d11]' }}"
            alt="Dashboard Icon">
        <h1>Dashboard</h1>
    </a>
</div>

<div class="mx-6 mb-4">
    <a href="{{ route("{$link}.projectdev") }}"
        class="p-2 flex items-center w-full gap-2 rounded-md 
        {{ request()->is("{$link}/projectdev") ? 'bg-[#f68e12] text-white font-bold' : '' }}"
        style="{{ request()->is("{$link}/projectdev") ? 'box-shadow: 0 1px 10px rgba(0, 0, 0, 0.6);' : '' }}">

        @if (request()->is("{$link}/projectdev"))
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
    <a href="{{ route("{$link}.profile") }}"
        class="p-2 flex items-center w-full gap-2 rounded-md 
        {{ request()->is("{$link}/profile") ? 'bg-[#f68e12] text-white font-bold' : '' }}"
        style="{{ request()->is("{$link}/profile") ? 'box-shadow: 0 1px 10px rgba(0, 0, 0, 0.6);' : '' }}">

        @if (request()->is("{$link}/profile"))
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
    <a href="{{ route("{$link}.promotions") }}"
        class="p-2 flex items-center w-full gap-2 rounded-md 
        {{ request()->is("{$link}/promotions") ? 'bg-[#f68e12] text-white font-bold' : '' }}"
        style="{{ request()->is("{$link}/promotions") ? 'box-shadow: 0 1px 10px rgba(0, 0, 0, 0.6);' : '' }}">

        @if (request()->is("{$link}/promotions"))
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
