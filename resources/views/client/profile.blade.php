<div class="mx-auto max-w-screen-2xl">
  <x-navbar link="client">
      <div class="h-full mx-auto max-w-screen-xl">
          {{-- UPPER PART --}}
          <x-header.upper-part name="Gabbiy" header="Profile" />

          {{-- Middle Part --}}
          <div class="grid px-10 mt-10 grid-cols-3 h-80 gap-6 pr-32 text-black">
            <div class="col-span-3 lg:col-span-1 bg-white shadow-md rounded-md pt-10">
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


            <div class="col-span-3 lg:col-span-2 bg-white shadow-md rounded-md p-5">
              <div class="flex justify-between">
                <h1 class="text-sm">User Information</h1>
                <div class="px-4 py-1 bg-[#f68e12] cursor-pointer text-white" onclick="window.location.assign('{{ route('client.profile.edit') }}')">Edit</div>
              </div>  
              <div class="space-y-2">
                <div>
                  <div class="flex space-x-2 items-center">
                    <img src="/Assets/name.png" class="w-5 h-4" alt="">
                    <h1>Name</h1>
                  </div>
                  <p class="pl-4">{{$user->name}}</p>
                </div>
                <div>
                  <div class="flex space-x-2 items-center">
                    <img src="/Assets/email.png" class="w-5 h-4" alt="">
                    <h1>Email</h1>
                  </div>
                  <p class="pl-4">{{$user->email}}</p>
                </div>
                <div>
                  <div class="flex space-x-2 items-center">
                    <img src="/Assets/phone-number.png" class="w-5 h-4" alt="">
                    <h1>Phone</h1>
                  </div>
                  <p class="pl-4">{{$user->phone}}</p>
                </div>
                <div>
                  <div class="flex space-x-2 items-center">
                    <img src="/Assets/address.png" class="w-5 h-4" alt="">
                    <h1>Address</h1>
                  </div>
                  <p class="pl-4">{{$user->address}}</p>
                </div>
              </div>      
            </div>
          </div>
      </div>
  </x-navbar>
</div>
