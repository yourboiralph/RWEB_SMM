<x-navbar link="admin">
    {{-- UPPER PART --}}
    <x-header.upper-part name="{{ $auth->name }}" header="Projects"/>

    {{-- Main Content --}}
    <hr>
    <div class="m-10 px-10">
        <div class="mx-auto max-w-screen-xl">
            @if (session('success'))
                <div id="success-message" class="bg-green-500 text-white p-4 rounded-md mb-4">
                    {{ session('success') }}
                </div>
            @endif
        
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
                    <tbody>
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
                            <td class="border border-gray-300 px-4 py-2 text-center relative">
                                <div class="relative inline-block">
                                    <i class="fa-solid fa-ellipsis cursor-pointer" style="color: #fa7011;" onclick="toggleDropdown(event, 'dropdown-{{ $project->id }}')"></i>
                                    <!-- Dropdown Menu -->
                                    <div id="dropdown-{{ $project->id }}" class="dropdown-menu hidden absolute right-0 mt-2 w-32 bg-white border border-gray-200 shadow-md rounded-md z-10">
                                        <ul class="text-left text-sm">
                                            <li class="px-4 py-2 hover:bg-gray-100 cursor-pointer" onclick="window.location.href='{{ route('admin.project.view', $project->id) }}'">View</li>
                                            <li class="px-4 py-2 hover:bg-gray-100 cursor-pointer" onclick="window.location.href='{{ route('admin.project.edit', $project->id) }}'">Edit</li>
                                            <li class="px-4 py-2 text-red-500 hover:bg-gray-100 cursor-pointer" onclick="confirmDelete('{{ route('admin.project.delete', $project->id) }}')">Delete</li>
                                        </ul>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>  
        </div>
    </div>
</x-navbar>

<script>
    document.addEventListener("click", function(event) {
        // Close all dropdowns if clicked outside
        document.querySelectorAll(".dropdown-menu").forEach(menu => {
            if (!menu.contains(event.target) && !menu.previousElementSibling.contains(event.target)) {
                menu.classList.add("hidden");
            }
        });
    });

    function toggleDropdown(event, id) {
        event.stopPropagation(); // Prevent closing when clicking the button
        const menu = document.getElementById(id);
        menu.classList.toggle("hidden");
    }

    function confirmDelete(url) {
        if (confirm("Are you sure you want to delete this project?")) {
            window.location.href = url;
        }
    }

    setTimeout(function() {
        var message = document.getElementById('success-message');
        if (message) {
            message.style.transition = "opacity 0.5s";
            message.style.opacity = "0";
            setTimeout(() => message.style.display = "none", 500); // Wait for fade-out before hiding
        }
    }, 3000); // 3 seconds delay
</script>
