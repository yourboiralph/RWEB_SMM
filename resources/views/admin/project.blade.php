<x-navbar>
    {{-- UPPER PART --}}
    <x-header.upper-part name="{{ $auth->name }}" header="Projects"/>

    {{-- Main Content --}}
    <hr>
    <div class="m-10 px-10">
        <div class="mx-auto max-w-screen-xl">
            <div class="px-4 py-2 bg-[#fa7011] w-fit rounded-md mb-4 text-white cursor-pointer hover:bg-[#e5630f]" onclick="window.location.href='{{ route('admin.project.create') }}'">
                Create Project
            </div>          
            <div class="max-h-[500px] overflow-y-auto rounded-md">
                <table class="table-auto w-full overflow-y-auto">
                    <thead class="sticky top-0 bg-[#fa7011] text-white">
                        <tr class="bg-[#fa7011] text-white">
                            <th class="border border-gray-300 px-4 py-2">Project Name</th>
                            <th class="border border-gray-300 px-4 py-2">Description</th>
                            <th class="border border-gray-300 px-4 py-2">Deadline</th>
                            <th class="border border-gray-300 px-4 py-2">Status</th>
                            <th class="border border-gray-300 px-4 py-2">Action</th>
                        </tr>
                    </thead>
                    <tbody class="">
                        @foreach ($projects as $project)
                        <tr>
                            <td class="border border-gray-300 px-4 py-2">{{ $project->project_name }}</td>
                            <td class="border border-gray-300 px-4 py-2">{{ $project->description }}</td>
                            <td class="border border-gray-300 px-4 py-2 text-center">{{ $project->target_date }}</td>
                            <td class="border border-gray-300 px-4 py-2 text-center">
                                <span 
                                    class="{{ $project->status !== 'completed' ? 'text-red-500 font-bold' : 'text-green-500 font-bold' }}">
                                    {{ ucfirst($project->status) }}
                                </span>
                            </td>
                            <td class="border border-gray-300 px-4 py-2 text-center">
                                <i class="fa-solid fa-ellipsis cursor-pointer" style="color: #fa7011;"></i>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>  
            
        </div>
    </div>
</x-navbar>
