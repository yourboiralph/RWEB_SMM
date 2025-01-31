<x-navbar>
    {{-- UPPER PART --}}
    <x-header.upper-part name="{{$auth->name}}" header="Project" />

    {{-- Main Content --}}
    <hr>
    <div class="m-10 px-6 relative">
        <div class="w-full flex justify-end">
            <div class="px-4 py-2 bg-[#fa7011] w-fit rounded-md mb-4 text-white cursor-pointer hover:bg-[#e5630f]" onclick="window.location.href='{{ route('admin.project') }}'">
                Back
            </div>  
        </div>

        <div class="grid grid-cols-2 border p-10 bg-[#fa7011] rounded text-white shadow-lg">
            <div class="space-y-10">
                <div>
                    <label class="block text-sm text-white">Project Name</label>
                    <h1>{{$project->project_name}}</h1>
                </div>
                <div>
                    <label class="block text-sm text-white">Project Description</label>
                    <h1>{{$project->description}}</h1>
                </div>
            </div>

            <div class="space-y-10">
                <div>
                    <label class="block text-sm text-white">Client</label>
                    <h1>{{$project->client->name}}</h1>
                </div>
                <div class="grid grid-cols-2">
                    <div>
                        <label class="block text-sm text-white">Deadline</label>
                        <h1>{{$project->target_date}}</h1>
                    </div>
                    <div>
                        <label class="block text-sm text-white">
                            Status
                        </label>
                        
                        <h1 class="@if ($project->status !== 'completed') text-green-500 font-bold @endif">{{ucfirst($project->status)}}</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-navbar>
