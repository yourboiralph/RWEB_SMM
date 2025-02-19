@extends('layouts.application')

{{-- Pass "client" to the layout --}}
@php
    $link = 'operations';
@endphp

@section('content')
    <div class="mx-auto max-w-screen-2xl">
        {{-- UPPER PART --}}
        <x-header.upper-part header="Project" />

        {{-- Main Content --}}
        <hr>
        <div class="m-10 px-6 relative">

            <div class="w-full flex justify-end">
                <div class="px-4 py-2 bg-[#fa7011] w-fit rounded-md mb-4 text-white cursor-pointer hover:bg-[#e5630f]"
                    onclick="window.location.href='{{ route('admin.project') }}'">
                    Back
                </div>
            </div>

            <h1 class="text-[#fa7011] font-bold text-2xl mb-10">Create a project</h1>
            <form action="{{ url('/admin/project/store') }}" method="POST">
                @csrf
                <div>
                    <label class="block text-sm text-[#fa7011]">Project Name</label>
                    <input type="text" name="project_name" class="border p-2 w-full rounded-md">
                </div>
                <div class="mt-4">
                    <label class="block text-sm text-[#fa7011]">Project Description</label>
                    <textarea name="description" id="description"
                        class="border p-2 w-full h-auto rounded-md resize-none max-h-96 overflow-y-auto"></textarea>
                </div>
                <div class="mt-4">
                    <label class="block text-sm text-[#fa7011]">Client</label>
                    <p id="selected-client">No client selected</p>
                    <input type="hidden" name="client_id" id="client-id">
                    <div class="w-fit px-4 py-2 bg-[#fa7011] cursor-pointer rounded-lg text-white" id="open-modal">
                        Select Clients
                    </div>
                </div>
                <div class="mt-4">
                    <label class="block text-sm text-[#fa7011]">Deadline</label>
                    <input type="date" class="border p-2 w-full rounded-md" name="target_date">
                </div>
                {{-- Submit Button Positioned to Lower Right --}}
                <div class="flex justify-end mt-6">
                    <button type="submit" class="px-6 py-2 bg-[#fa7011] text-white rounded-md">Create</button>
                </div>
            </form>
        </div>
    </div>

    {{-- Include the Modal --}}
    @include('components.modal.select-client')

    {{-- Modal Toggle Script --}}
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const openModal = document.getElementById('open-modal');
            const modal = document.getElementById('client-modal');
            const closeModal = document.getElementById('close-modal');
            const clientElements = document.querySelectorAll('.select-client');
            const selectedClientDisplay = document.getElementById('selected-client');
            const clientIdInput = document.getElementById('client-id');

            // Open modal
            openModal.addEventListener('click', () => {
                modal.classList.remove('hidden');
            });

            // Close modal
            closeModal.addEventListener('click', () => {
                modal.classList.add('hidden');
            });

            // Select a client and update the UI
            clientElements.forEach(element => {
                element.addEventListener('click', () => {
                    const clientId = element.getAttribute('data-client-id');
                    const clientName = element.getAttribute('data-client-name');

                    // Update UI
                    selectedClientDisplay.textContent = clientName;
                    clientIdInput.value = clientId;

                    // Close modal
                    modal.classList.add('hidden');
                });
            });
        });

        document.addEventListener('DOMContentLoaded', function() {
            const textarea = document.getElementById('description');

            textarea.addEventListener('input', function() {
                this.style.height = 'auto'; // Reset height
                this.style.height = (this.scrollHeight) + 'px'; // Adjust height based on content
            });
        });
    </script>
@endsection
