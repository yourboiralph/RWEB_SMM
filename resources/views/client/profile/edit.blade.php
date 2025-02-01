<div class="mx-auto max-w-screen-2xl">
  <x-navbar link="client">
    <div class="h-full mx-auto max-w-screen-xl text-sm">
      {{-- UPPER PART --}}
      <x-header.upper-part name="Gabbiy" header="Profile" />

      {{-- Middle Part --}}
      <div class="h-auto">
        <div class="px-10 pr-32 text-white">
          <div class="w-full flex justify-end items-end mb-4 cursor-pointer"
            onclick="window.location.assign('{{ route('client.profile') }}')">
            <div class="w-fit px-4 py-1 bg-[#f68e12]">Back</div>
          </div>
          <div class="grid grid-cols-3 h-80 gap-6 text-black">
            <div
              class="col-span-3 px-4 lg:col-span-1 h-fit pb-10 bg-white shadow-md rounded-md pt-10 border border-[#e1e1e1]">
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
                      <input class="pl-4 col-span-2 w-full border rounded-md py-1 border-[#e1e1e1]"
                        value="{{ old('name', $user->name) }}" name="name">
                      @error('name')
              <p class="text-sm text-red-700">{{$message}}</p>
            @enderror
                    </div>

                    <div class="gap-4 items-center">
                      <div class="flex space-x-2 items-center text-slate-500 font-bold">
                        <h1>Email</h1>
                      </div>
                      <input class="pl-4 col-span-2 w-full border rounded-md py-1 border-[#e1e1e1]"
                        value="{{old('email', $user->email)}}" name="email">
                      @error('email')
              <p class="text-sm text-red-700">{{$message}}</p>
            @enderror
                    </div>

                    <div class="gap-4 items-center">
                      <div class="flex space-x-2 items-center text-slate-500 font-bold">
                        <h1>Phone</h1>
                      </div>
                      <input class="pl-4 col-span-2 w-full border rounded-md py-1 border-[#e1e1e1]"
                        value="{{old('phone', $user->phone)}}" name="phone">
                      @error('phone')
              <p class="text-sm text-red-700">{{$message}}</p>
            @enderror
                    </div>

                    <div class="gap-4 items-center pb-4">
                      <div class="flex space-x-2 items-center text-slate-500 font-bold">
                        <h1>Address</h1>
                      </div>
                      <input class="pl-4 col-span-2 w-full border rounded-md py-1 border-[#e1e1e1]"
                        value="{{$user->address}}" name="address">
                      @error('address')
              <p class="text-sm text-red-700">{{$message}}</p>
            @enderror
                    </div>
                  </div>

                  <hr>

                  <div class="">
                    <div class="text-slate-500">
                      <h1 class="text-sm">Password</h1>
                    </div>
                    <div class="gap-4 items-center text-slate-500 font-bold">
                      <div class="flex space-x-2 items-center">
                        <h1>Current Password</h1>
                      </div>
                      <input type="password" name="current_password"
                        class="pl-4 col-span-2 w-full border rounded-md py-1 border-[#e1e1e1]">
                      @error('current_password]')
              <p class="text-sm text-red-700">{{$message}}</p>
            @enderror
                    </div>
                    <div class="gap-4 items-center text-slate-500 font-bold">
                      <div class="flex space-x-2 items-center">
                        <h1>New Password</h1>
                      </div>
                      <input type="password" name="password"
                        class="pl-4 col-span-2 w-full border rounded-md py-1 border-[#e1e1e1]">
                      @error('password')
              <p class="text-sm text-red-700">{{$message}}</p>
            @enderror
                    </div>
                    <div class="gap-4 items-center text-slate-500 font-bold">
                      <div class="flex space-x-2 items-center">
                        <h1>Confirm Password</h1>
                      </div>
                      <input type="password" name="password_confirmation"
                        class="pl-4 col-span-2 w-full border rounded-md py-1 border-[#e1e1e1]">
                      @error('password_confirmation')
              <p class="text-sm text-red-700">{{$message}}</p>
            @enderror
                    </div>

                    <div class="pt-4">
                      <button type="submit" class="px-4 py-1 bg-[#f68e12] w-fit cursor-pointer text-white">
                        Save
                      </button>
                    </div>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </x-navbar>
</div>