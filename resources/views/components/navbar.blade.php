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

        @if(Request::is('client/*'))
            <x-sidebar.client-sidebar link="client" />
        @elseif(Request::is('admin/*'))
            <x-sidebar.admin-sidebar link="admin" />
        @endif
    

    </div>

    <div class="flex-1 bg-[#ffffff] ml-80">
        <div>
            {{ $slot }}
        </div>


    </div>
    </div>
</body>

</html>
