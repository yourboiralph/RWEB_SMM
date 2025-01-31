<x-navbar>
    {{-- UPPER PART --}}
    <x-header.upper-part name="{{ $auth->name ?? '???' }}" header="Job Order" />

    {{-- Main Content --}}
    <hr>
    <div class="m-10 px-6">
        <div class="w-full flex justify-between">
            <h1 class="text-[#fa7011] font-bold text-2xl">Create Job Order</h1>
            <div class="px-4 py-2 bg-[#fa7011] w-fit rounded-md mb-4 text-white cursor-pointer hover:bg-[#e5630f]" onclick="window.location.href='{{ route('admin.joborder') }}'">
                Back
            </div>  
        </div>
        <form action="{{url('/admin/joborder/store')}}" method="POST">
            @csrf
            <div>
                <label class="block text-sm text-[#fa7011]">Job Order</label>
                <input type="text" name="job_name" 
                    class="border p-2 w-full rounded-md @error('project_name') border-red-500 @enderror">
                @error('project_name')
                    <p class="text-red-500 text-sm">{{ $message }}</p>
                @enderror
            </div>            
            <div class="mt-4">
                <label class="block text-sm text-[#fa7011]">Job Order Description</label>
                <textarea name="description" id="description" class="border p-2 w-full h-auto rounded-md resize-none max-h-96 overflow-y-auto @error('description') border-red-500 @enderror"></textarea>
                @error('description')
                    <p class="text-red-500 text-sm">{{$message}}</p>
                @enderror
            </div>
            <div class="mt-4">
                <label class="block text-sm text-[#fa7011]">Worker</label>
                <p id="selected-client">No worker selected</p>
                <input type="hidden" name="worked_by" id="client-id">
                <div
                    class="w-fit px-4 py-2 bg-[#fa7011] cursor-pointer rounded-lg text-white"
                    id="open-modal"
                >
                    Select Worker
                </div>
                @error('client_id')
                    <p class="text-red-500 text-sm">{{$message}}</p>
                @enderror
            </div>
            <div class="mt-4">
                <label class="block text-sm text-[#fa7011]">Project</label>
                <p id="selected-client">No project selected</p>
                <input type="hidden" name="project_id" id="client-id">
                <div
                    class="w-fit px-4 py-2 bg-[#fa7011] cursor-pointer rounded-lg text-white"
                    id="open-modal"
                >
                    Select Project
                </div>
                @error('client_id')
                    <p class="text-red-500 text-sm">{{$message}}</p>
                @enderror
            </div>
            <div class="mt-4">
                <label class="block text-sm text-[#fa7011]">Deadline</label>
                <input type="date" class="border p-2 w-full rounded-md @error('target_date') border-red-500 @enderror" name="target_date">
                @error('target_date')
                    <p class="text-red-500 text-sm">{{$message}}</p>
                @enderror
            </div>
            {{-- Submit Button Positioned to Lower fucking righyou ng nigga --}}
            <div class="flex justify-end mt-6">
                <button type="submit" class="px-6 py-2 bg-[#fa7011] text-white rounded-md">Create</button>
            </div>
        </form>
    </div>

    
</x-navbar>
