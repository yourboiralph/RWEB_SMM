@props(['link' => ''])

<div class="space-y-4 z-10">
    @if ($link === 'admin')
        {{-- Admin Sidebar Menu --}}
        <div class="hidden md:block md:px-6">
            <a href="{{ route("admin.project") }}"
                class="p-2 flex items-center w-full gap-2 rounded-md 
                {{ request()->is("admin/project", "admin/project/*") ? 'bg-[#f68e12] text-white font-bold' : '' }}"
                style="{{ request()->is("admin/project", "admin/project/*") ? 'box-shadow: 0 1px 10px rgba(0, 0, 0, 0.6);' : '' }}">
                <img src="/Assets/icon-dashboard-white.png"
                    draggable="false"
                    class=" p-2 rounded-lg w-10 h-10 {{ request()->is("admin/project", "admin/project/*") ? 'bg-black' : 'bg-[#f66d11]' }}"
                    alt="project Icon">
                <h1 class="hidden md:block">Project</h1>
            </a>
        </div>

        <div class="hidden md:block md:px-6">
            <a href="{{ route("admin.joborder") }}"
                class="p-2 flex items-center w-full gap-2 rounded-md 
                {{ request()->is("admin/joborder", "admin/joborder/*") ? 'bg-[#f68e12] text-white font-bold' : '' }}"
                style="{{ request()->is("admin/joborder", "admin/joborder/*") ? 'box-shadow: 0 1px 10px rgba(0, 0, 0, 0.6);' : '' }}">
                <img src="/Assets/icon-projdev-white.png"
                    draggable="false"
                    class="p-2 rounded-lg w-10 h-10 {{ request()->is("admin/joborder", "admin/joborder/*") ? 'bg-black' : 'bg-[#f66d11]' }}"
                    alt="joborder Icon">
                <h1 class="hidden md:block">Job Order</h1>
            </a>
        </div>

    @elseif ($link === 'client')
        {{-- Client Sidebar Menu --}}
        <div class="hidden md:block md:px-6">
            <a href="{{ route("client.dashboard") }}"
                class="p-2 flex items-center w-full gap-2 rounded-md 
                {{ request()->is("client/dashboard", "client/dashboard/*") ? 'bg-[#f68e12] text-white font-bold' : '' }}"
                style="{{ request()->is("client/dashboard", "client/dashboard/*") ? 'box-shadow: 0 1px 10px rgba(0, 0, 0, 0.6);' : '' }}">
                <img src="/Assets/icon-dashboard-white.png"
                    draggable="false"
                    class=" p-2 rounded-lg w-10 h-10 {{ request()->is("client/dashboard", "client/dashboard/*") ? 'bg-black' : 'bg-[#f66d11]' }}"
                    alt="Dashboard Icon">
                <h1 class="hidden md:block">Dashboard</h1>
            </a>
        </div>

        <div class="hidden md:block md:px-6">
            <a href="{{ route("client.projectdev") }}"
                class="p-2 flex items-center w-full gap-2 rounded-md 
                {{ request()->is("client/projectdev", "client/projectdev/*") ? 'bg-[#f68e12] text-white font-bold' : '' }}"
                style="{{ request()->is("client/projectdev", "client/projectdev/*") ? 'box-shadow: 0 1px 10px rgba(0, 0, 0, 0.6);' : '' }}">
                <img src="/Assets/icon-projdev-white.png"
                    draggable="false"
                    class="p-2 rounded-lg w-10 h-10 {{ request()->is("client/projectdev", "client/projectdev/*") ? 'bg-black' : 'bg-[#f66d11]' }}"
                    alt="Project Development Icon">
                <h1 class="hidden md:block">Project Development</h1>
            </a>
        </div>

        <div class="hidden md:block md:px-6">
            <a href="{{ route("client.profile") }}"
                class="p-2 flex items-center w-full gap-2 rounded-md 
                {{ request()->is("client/profile", "client/profile/*") ? 'bg-[#f68e12] text-white font-bold' : '' }}"
                style="{{ request()->is("client/profile", "client/profile/*") ? 'box-shadow: 0 1px 10px rgba(0, 0, 0, 0.6);' : '' }}">
                <img src="/Assets/icon-profile-white.png"
                    draggable="false"
                    class="p-2 rounded-lg w-10 h-10 {{ request()->is("client/profile", "client/profile/*") ? 'bg-black' : 'bg-[#f66d11]' }}"
                    alt="Profile Icon">
                <h1 class="hidden md:block">Profile</h1>
            </a>
        </div>
    @endif
</div>
