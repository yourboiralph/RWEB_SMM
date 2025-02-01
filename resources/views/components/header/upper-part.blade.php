@php
    $user = Auth::user();
@endphp

<div class="grid grid-cols-3">
    <x-pagetitle header="{{$header}}" />
    <div class="hidden md:block">
        <div class="bg-[#fa7011] rounded-bl-[40px] flex items-center justify-center gap-8 h-fit px-2 py-4">
            <h1 class="text-white hidden lg:block">Hi, {{ $user->name ?? 'Guest' }}</h1>
            <img src="/Assets/user-profile.png" class="w-20" alt="" draggable="false">
            <div>
                <i class="fa-solid fa-power-off text-xl bg-white px-2 py-1 rounded-lg" style="color: #fa7011;"></i>
            </div>
        </div>
    </div>
</div>
