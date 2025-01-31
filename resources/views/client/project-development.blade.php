<div class="mx-auto max-w-screen-2xl">
  <x-navbar link="client">
      <div class="h-full mx-auto max-w-screen-xl">
          {{-- UPPER PART --}}
          <x-header.upper-part name="Gabbiy" header="Dashboard" />

          {{-- Middle Part --}}
          <div class="grid px-10 mt-20">
            <div class="px-6 py-4 bg-white shadow-md rounded-md">
              {{-- Search Bar --}}
              <div class="flex items-center mb-4">
                <input 
                  type="text" 
                  class="w-full px-4 py-2 border rounded-l-md focus:outline-none focus:ring-2 focus:ring-orange-500" 
                  placeholder="Search..."
                />
                <button class="px-4 py-2 bg-gray-200 rounded-r-md hover:bg-gray-300">
                  <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2v6m-6 2a9 9 0 118 0H4z" />
                  </svg>
                </button>
              </div>
          
              {{-- Table --}}
              <table class="w-full text-left border-collapse">
                <thead class="bg-orange-100">
                  <tr>
                    <th class="px-6 py-3 border-b-2">File Name</th>
                    <th class="px-6 py-3 border-b-2">Submission Date</th>
                    <th class="px-6 py-3 border-b-2">Status</th>
                    <th class="px-6 py-3 border-b-2 text-center">Actions</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($projects as $project)
                    <tr>
                      <td class="px-6 py-3 border-b">{{ $project->project_name }}</td>
                      <td class="px-6 py-3 border-b">{{ $file->created_at }}</td>
                      <td class="px-6 py-3 border-b">
                        @if ($file->status === 'New')
                          <span class="px-3 py-1 text-sm text-white bg-orange-500 rounded-full">Waiting</span>
                        @elseif ($file->status === 'Next Phase')
                          <span class="px-3 py-1 text-sm text-white bg-gray-500 rounded-full">Next Phase</span>
                        @else
                          <span class="px-3 py-1 text-sm text-white bg-green-500 rounded-full">Signed</span>
                        @endif
                      </td>
                      <td class="px-6 py-3 border-b flex justify-center space-x-2">
                        <button class="px-4 py-2 text-sm text-white bg-orange-500 rounded hover:bg-orange-600">
                          Approval Form
                        </button>
                        <button class="px-4 py-2 text-sm text-white bg-gray-700 rounded hover:bg-gray-800">
                          Download
                        </button>
                      </td>
                    </tr>
                  @endforeach
                </tbody>
              </table>
          
              {{-- Pagination --}}
              <div class="flex items-center justify-between mt-4">
                {{-- {{ $files->links() }} --}}
              </div>
            </div>
          </div>
      </div> <!-- Missing closing div added here -->
  </x-navbar>
</div>


