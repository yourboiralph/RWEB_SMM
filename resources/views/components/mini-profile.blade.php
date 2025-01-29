@props(['name' => ''])

<div class="bg-[#fa7011] rounded-bl-[40px] flex items-center justify-center gap-8 ml-8 mb-8">
    <h1 class="text-white">Hi, {{$name}}</h1>
    <img src="/Assets/user-profile.png" class="w-20" alt="">
    <div>
        <i class="fa-solid fa-power-off text-xl bg-white px-2 py-1 rounded-lg" style="color: #fa7011;"></i>
    </div>
</div>