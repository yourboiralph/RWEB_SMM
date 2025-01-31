<x-navbar>
    {{-- UPPER PART --}}
    <x-header.upper-part name="{{ $auth->name }}" header="Projects" />

    {{-- Main Content --}}
    <hr>
    <div class="m-10 px-10">
        <div class="mx-auto max-w-screen-xl">
            <div class="px-4 py-2 bg-[#fa7011] w-fit rounded-md mb-4 text-white cursor-pointer hover:bg-[#e5630f]" onclick="window.location.href='{{ route('admin.project.create') }}'">
                Create Project
            </div>            
            <table class="table-auto border-collapse border border-gray-400 w-full">
                <thead>
                    <tr class="bg-[#fa7011] text-white">
                        <th class="border border-gray-300 px-4 py-2">Project Name</th>
                        <th class="border border-gray-300 px-4 py-2">Description</th>
                        <th class="border border-gray-300 px-4 py-2">Deadline</th>
                        <th class="border border-gray-300 px-4 py-2">Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($projects as $project)
                    <tr>
                        <td class="border border-gray-300 px-4 py-2">{{ $project->project_name }}</td>
                        <td class="border border-gray-300 px-4 py-2">{{ $project->description }}</td>
                        <td class="border border-gray-300 px-4 py-2 text-center">{{ $project->target_date }}</td>
                        <td class="border border-gray-300 px-4 py-2 text-center">
                            <span 
                                class="{{ $project->status !== 'complete' ? 'text-red-500 font-bold' : '' }}">
                                {{ ucfirst($project->status) }}
                            </span>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-navbar>
