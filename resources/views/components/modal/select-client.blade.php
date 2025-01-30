<div
    id="client-modal"
    class="fixed inset-0 z-30 bg-black bg-opacity-50 flex justify-center items-center hidden"
>
    <div class="bg-white rounded-lg p-6 w-[90vw] h-[90vh]">
        <div class="flex justify-between items-center">
            <h2 class="text-xl text-[#fa7011]">Select Client</h2>
            <button id="close-modal" class="text-xl font-bold">&times;</button>
        </div>
        <div class="mt-4">
            @foreach ($clients as $client)
                <div 
                    class="p-2 border-b cursor-pointer hover:bg-gray-200 select-client"
                    data-client-id="{{ $client->id }}"
                    data-client-name="{{ $client->name }}"
                >
                    <p>{{ $client->name }}</p>
                </div>
            @endforeach
        </div>
    </div>
</div>
