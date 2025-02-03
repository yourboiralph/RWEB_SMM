<div class="mx-auto max-w-screen-2xl">
    <x-navbar link="client">
        <div class="h-full mx-auto max-w-screen-xl">
            {{-- UPPER PART --}}
            <x-header.upper-part header="Dashboard" />

            {{-- Middle Part --}}
            <div class="h-auto">
                <div class="grid px-10 pt-20">
                    <div class="px-6 py-4 bg-white shadow-md rounded-md">
                        {{-- Search Bar --}}
                        {{-- Search Bar --}}
                        <div class="flex items-center mb-4 relative w-fit">
                          <i class="fa-solid fa-magnifying-glass absolute pl-4"></i>
                          <button class="absolute right-2 px-4 py-2 bg-gray-200 rounded-md hover:bg-gray-300">
                            <i class="fa-solid fa-filter"></i>
                          </button>
                            <input type="text" id="searchInput"
                                class="px-10 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-orange-500"
                                placeholder="Search..." />
                        </div>

                        {{-- Table Wrapper --}}
                        <div class="h-96 overflow-auto">
                            <table class="w-full text-left border-collapse" id="projectTable">
                                <thead class="sticky top-0 bg-[#fa7011] text-white">
                                    <tr>
                                        <th class="px-6 py-3 border-b-2">File Name</th>
                                        <th class="px-6 py-3 border-b-2">Submission Date</th>
                                        <th class="px-6 py-3 border-b-2">Status</th>
                                        <th class="px-6 py-3 border-b-2 text-center">Actions</th>
                                    </tr>
                                </thead>
                                <tbody id="tableBody">
                                    @foreach ($list_of_projects as $project)
                                        <tr class="project-row" data-name="{{ strtolower($project->project_name) }}"
                                            data-date="{{ strtolower($project->target_date) }}"
                                            data-status="{{ strtolower($project->status) }}">
                                            <td class="px-6 py-3 border-b">{{ $project->project_name }}</td>
                                            <td class="px-6 py-3 border-b">{{ $project->target_date }}</td>
                                            <td class="px-6 py-3 border-b">
                                                {{$project->status}}
                                            </td>
                                            <td class="px-6 py-3 border-b flex justify-center space-x-2">
                                                <a href="/client/projectdev/form/approval/{{$project->id}}">
                                                    <button class="px-4 py-2 text-sm text-white bg-orange-500 rounded hover:bg-orange-600">
                                                        Approval Form
                                                    </button>
                                                </a>                                                
                                                <button
                                                    class="px-4 py-2 text-sm text-white bg-gray-700 rounded hover:bg-gray-800">
                                                    Download
                                                </button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>


                        {{-- Pagination Links --}}
                        <div class="mt-4">
                            {{ $list_of_projects->links('vendor.pagination.custom') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </x-navbar>
</div>


<script>
    document.getElementById("searchInput").addEventListener("keyup", function() {
        let filter = this.value.toLowerCase();
        let rows = document.querySelectorAll(".project-row");

        rows.forEach(row => {
            let name = row.getAttribute("data-name");
            let date = row.getAttribute("data-date");
            let status = row.getAttribute("data-status");

            if (name.includes(filter) || date.includes(filter) || status.includes(filter)) {
                row.style.display = ""; // Show row
            } else {
                row.style.display = "none"; // Hide row
            }
        });
    });
</script>
