<div class="mx-auto max-w-screen-2xl">
  <x-navbar link="client">
    <div class="h-full mx-auto max-w-screen-xl">
      {{-- UPPER PART --}}
      <x-header.upper-part name="Gabbiy" header="Profile" />

      {{-- Middle Part --}}
      <div class="grid px-10 mt-10 grid-cols-3 h-80 gap-6 pr-32 text-black">
        <div class="col-span-3 lg:col-span-1 h-fit pb-10 bg-white shadow-md rounded-md pt-10 border border-[#e1e1e1]">
          <div class="w-full flex justify-center items-center">
            <img src="/Assets/user-profile-profilepage.png" alt="">
          </div>
          <div class="text-center">
            <h1>{{$user->name}}</h1>
          </div>
          <div class="text-center">
            <h1>{{$user->address}}</h1>
          </div>
        </div>

        <div class="col-span-3 lg:col-span-2 bg-white shadow-md rounded-md p-5 border border-[#e1e1e1]">
          <div class="text-slate-500">
            <h1 class="text-sm">User Information</h1>
          </div>
          <form action="{{ route('client.profile.update') }}" method="POST">
           
  @csrf
  @method('PUT')
          <div class="space-y-2 ">
            <div class="h-fit">
              <div class="gap-4 items-center">
                <div class="flex space-x-2 items-center text-slate-500 font-bold">
                  <h1>Name</h1>
                </div>
                <input class="pl-4 col-span-2 w-full border rounded-md py-1 border-[#e1e1e1]" value={{$user->name}} name="name">
              </div>

              <div class="gap-4 items-center">
                <div class="flex space-x-2 items-center text-slate-500 font-bold">
                  <h1>Email</h1>
                </div>
                <input class="pl-4 col-span-2 w-full border rounded-md py-1 border-[#e1e1e1]"
                value={{$user->email}} name="email">
              </div>

              <div class="gap-4 items-center">
                <div class="flex space-x-2 items-center text-slate-500 font-bold">
                  <h1>Phone</h1>
                </div>
                <input class="pl-4 col-span-2 w-full border rounded-md py-1 border-[#e1e1e1]" value={{$user->phone}} name="phone">
              </div>

              <div class="gap-4 items-center mb-10">
                <div class="flex space-x-2 items-center text-slate-500 font-bold">
                  <h1>Address</h1>
                </div>
                <input class="pl-4 col-span-2 w-full border rounded-md py-1 border-[#e1e1e1]"
                value={{$user->address}} name="address">
              </div>
            </div>

            <hr>

            <div class="h-fit pt-10">
              <div class="text-slate-500">
                <h1 class="text-sm">Password</h1>
              </div>
              <div class="gap-4 items-center text-slate-500 font-bold">
                <div class="flex space-x-2 items-center">
                  <h1>Current Password</h1>
                </div>
                <input type="password" class="pl-4 col-span-2 w-full border rounded-md py-1 border-[#e1e1e1]"
                >
              </div>
              <div class="gap-4 items-center text-slate-500 font-bold">
                <div class="flex space-x-2 items-center">
                  <h1>New Password</h1>
                </div>
                <input type="password" class="pl-4 col-span-2 w-full border rounded-md py-1 border-[#e1e1e1]"
                >
              </div>
              <div class="gap-4 items-center text-slate-500 font-bold">
                <div class="flex space-x-2 items-center">
                  <h1>Confirm Password</h1>
                </div>
                <input type="password" class="pl-4 col-span-2 w-full border rounded-md py-1 border-[#e1e1e1]"
                  >
              </div>

              <button type="submit" class="px-4 py-2 bg-[#f68e12] w-fit mt-4 cursor-pointer text-white">
                Save
              </button>
            </div>
          </div>
        </form>
        </div>
      </div>
    </div>
  </x-navbar>
</div>