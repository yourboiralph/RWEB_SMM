{{-- SIDEBAR MENU --}}
@props(['link' => ''])

<div class="mx-6 mb-4">
    <a href="{{ route("{$link}.joborder") }}"
        class="p-2 flex items-center w-full gap-2 rounded-md 
        {{ request()->is("{$link}/joborder") ? 'bg-[#f68e12] text-white font-bold' : '' }}"
        style="{{ request()->is("{$link}/joborder") ? 'box-shadow: 0 1px 10px rgba(0, 0, 0, 0.6);' : '' }}">
        <img src="/Assets/icon-dashboard-white.png"
            draggable="false"
            class="p-2 rounded-lg w-10 h-10 {{ request()->is("{$link}/joborder") ? 'bg-black' : 'bg-[#f66d11]' }}"
            alt="Dashboard Icon">
        <h1>Job Order</h1>
    </a>
</div>

{{-- Add more here! --}}
<div class="mx-6 mb-4">
    <a href="{{ route("{$link}.project") }}"

        class="p-2 flex items-center w-full gap-2 rounded-md 
        {{ request()->is("{$link}/project") ? 'bg-[#f68e12] text-white font-bold' : '' }}"
        style="{{ request()->is("{$link}/project") ? 'box-shadow: 0 1px 10px rgba(0, 0, 0, 0.6);' : '' }}">
        <img src="/Assets/icon-dashboard-white.png"
            draggable="false"
            class="p-2 rounded-lg w-10 h-10 {{ request()->is("{$link}/project") ? 'bg-black' : 'bg-[#f66d11]' }}"
            alt="Dashboard Icon">
        <h1>Project</h1>
    </a>
</div>