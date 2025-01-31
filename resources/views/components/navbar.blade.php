@props(['link' => ''])
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

<body>
    <div class="grid grid-cols-12 relative">
        {{-- SIDEBAR --}}
        <div id="sidebar" class="sticky top-0 left-0 w-full col-span-12 shadow-md z-20 md:h-screen bg-white md:col-span-3 transition-all duration-300">
            <div class="grid grid-cols-6 p-6 w-full gap-4 items-center md:flex md:flex-row-reverse md:justify-end">
                <img class="col-span-4 w-full max-w-full sm:w-48 lg:w-64" src="/Assets/logo.png" draggable="false" alt="">
                <i id="toggleButton" class="col-span-2 text-end fa-solid fa-bars text-2xl cursor-pointer"></i>
            </div>            
            <hr class="hidden md:block md:border md:border-[#EC690F] mb-10">
            <x-sidebar.sidebar link="{{$link}}"/>
        </div>

        {{-- MAIN CONTENT --}}
        <div id="main-content" class="col-span-12 md:col-span-9 transition-all duration-300">
            {{$slot}}
        </div>
    </div>

    <script>
        function handleClick() {
            let sidebar = document.getElementById("sidebar");
            let mainContent = document.getElementById("main-content");

            // Check if the sidebar is currently expanded
            if (sidebar.classList.contains("sm:col-span-3")) {
                // Shrink sidebar to col-span-2
                sidebar.classList.remove("sm:col-span-3");
                sidebar.classList.add("sm:col-span-1");

                // Expand main content accordingly
                mainContent.classList.remove("sm:col-span-9");
                mainContent.classList.add("sm:col-span-11");
            } else {
                // Revert back to col-span-3
                sidebar.classList.remove("sm:col-span-1");
                sidebar.classList.add("sm:col-span-3");

                // Revert main content width
                mainContent.classList.remove("sm:col-span-11");
                mainContent.classList.add("sm:col-span-9");
            }
        }
    </script>
</body>

</html>
