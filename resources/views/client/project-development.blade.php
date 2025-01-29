<x-navbar>
    {{-- UPPER PART --}}
    <div class="grid grid-cols-3">
      <x-pagetitle header="Project Development" />

      {{-- PROPS FOR PROFILE --}}
    <x-mini-profile name="Gabby" />
  </div>
{{-- Middle Part --}}
<div class="grid grid-cols-3">
<div class="col-span-2 px-8">
<img src="/Assets/Banner.png" alt="">
</div>
<div class="mr-8 flex flex-col items-center">
<div class="px-2 py-4 w-full overflow-hidden rounded-lg shadow-md bg-white">
    <table class="table-auto w-full text-left border-collapse">
        <thead>
            <tr class="text-black">
                <th class="">Project Development</th>
                <th class="">Status</th>
                <th class=""></th>
            </tr>
        </thead>
        <tbody class="">
            <tr class="">
                <td class="text-[12px] py-2">DM Caption and Graphics</td>
                <td class="text-[12px] py-2">Next Phase</td>
                <td class="text-[12px] text-orange-500 cursor-pointer py-2">Sign Now</td>
            </tr>
            <tr>
                <td class="text-[12px] py-2">DM Monthly Campaign Content</td>
                <td class="text-[12px] py-2">Waiting</td>
                <td class="text-[12px] text-orange-500 cursor-pointer py-2">Sign Now</td>
            </tr>
        </tbody>
    </table>
</div>
<div class="mt-10 w-fit flex flex-col justify-center items-center shadow-lg">
    <div class="h-56 w-72">
        <iframe width="100%" height="100%" src="https://www.youtube.com/embed/QF-HFO7Uop0?si=APB2sG6Xrdm-C-ct" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
    </div>
    <div class="h-20 w-72 bg-white flex items-center justify-center gap-8">
        <i class="fa-brands fa-facebook-f px-3 py-2 rounded-full bg-[#fa7011]" style="color: #ffffff;"></i>
        <i class="fa-brands fa-instagram px-3 py-2 rounded-full bg-[#fa7011]" style="color: #ffffff;"></i>
        <i class="fa-brands fa-pinterest-p px-3 py-2 rounded-full bg-[#fa7011]" style="color: #ffffff;"></i>
    </div>
</div>
</div>
</div>

{{-- Bottom Part --}}
<div class="w-full mt-14">
<div class="carousel">
<div class="carousel-track">
  <a href="https://link1.com" class="carousel-item">
    <img src="/Assets/ads1.png" alt="Image 1">
  </a>
  <a href="https://link2.com" class="carousel-item">
    <img src="/Assets/ads2.png" alt="Image 2">
  </a>
  <a href="https://link3.com" class="carousel-item">
    <img src="/Assets/ads3.png" alt="Image 3">
  </a>
  <a href="https://link4.com" class="carousel-item">
    <img src="/Assets/ads4.png" alt="Image 4">
  </a>
  <!-- Duplicate items for seamless looping -->
  <a href="https://link1.com" class="carousel-item">
    <img src="/Assets/ads1.png" alt="Image 1">
  </a>
  <a href="https://link2.com" class="carousel-item">
    <img src="/Assets/ads2.png" alt="Image 2">
  </a>
  <a href="https://link3.com" class="carousel-item">
    <img src="/Assets/ads3.png" alt="Image 3">
  </a>
  <a href="https://link4.com" class="carousel-item">
    <img src="/Assets/ads4.png" alt="Image 4">
  </a>
</div>
</div>
</div>
</x-navbar>