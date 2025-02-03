@extends('layouts.application')

{{-- Pass "client" to the layout --}}
@php
    $link = 'operations';
@endphp

@section('content')
    <div class="mx-auto max-w-screen-2xl">
        <!-- DataTables CSS -->
        <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">

        <!-- Tailwind CSS (Optional for Styling) -->
        <script src="https://cdn.tailwindcss.com"></script>
        {{-- UPPER PART --}}
        <x-header.upper-part header="Projects" />

        {{-- Main Content --}}
        <hr>
        <div class="m-10 px-10">
            <div class="mx-auto max-w-screen-xl">
                @if (session('success'))
                    <div id="success-message" class="bg-green-500 text-white p-4 rounded-md mb-4">
                        {{ session('success') }}
                    </div>
                @endif

                <div class="px-4 py-2 bg-[#fa7011] w-fit rounded-md mb-4 text-white cursor-pointer hover:bg-[#e5630f]"
                    onclick="window.location.href='{{ route('admin.project.create') }}'">
                    Create Project
                </div>

                <div class="max-h-[500px] overflow-y-auto rounded-md">
                    <table id="projects_table" class="table-auto w-full overflow-y-auto">
                        <thead class="sticky top-0 bg-[#fa7011] text-white">
                            <tr class="bg-[#fa7011] text-white">
                                <th class="border border-gray-300 px-4 py-2">Project Name</th>
                                <th class="border border-gray-300 px-4 py-2">Description</th>
                                <th class="border border-gray-300 px-4 py-2">Deadline</th>
                                <th class="border border-gray-300 px-4 py-2">Status</th>
                                <th class="border border-gray-300 px-4 py-2">Action</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <!-- jQuery (must be loaded first) -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- DataTables JS -->
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>

    <script>
        // Success message fade-out
        setTimeout(function() {
            var message = document.getElementById('success-message');
            if (message) {
                message.style.transition = "opacity 0.5s";
                message.style.opacity = "0";
                setTimeout(() => message.style.display = "none", 500); // Wait for fade-out before hiding
            }
        }, 3000); // 3 seconds delay

        // Initialize DataTable
        $(document).ready(function() {
            $('#projects_table').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('admin.project') }}",
                lengthChange: false,
                columns: [{
                        data: 'project_name',
                        name: 'project_name'
                    },
                    {
                        data: 'description',
                        name: 'description'
                    },
                    {
                        data: 'target_date',
                        name: 'target_date'
                    },
                    {
                        data: 'status',
                        name: 'status'
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false
                    }
                ]
            });
        });
    </script>
@endsection
