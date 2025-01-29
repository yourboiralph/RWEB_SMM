<x-navbar>
  {{-- UPPER PART --}}
  <div class="grid grid-cols-3">
    <x-pagetitle header="Profile" />

    {{-- PROPS FOR PROFILE --}}
    <x-mini-profile name="Gabby" />
  </div>

  <div class="grid grid-cols-3 w-full h-80 m-10 px-6">
    <div class="col-span-1 bg-red-600"></div>
    <div class="col-span-2 bg-yellow-400 mr-14"></div>
  </div>

</x-navbar>
