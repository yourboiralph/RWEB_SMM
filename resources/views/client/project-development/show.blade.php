@extends('layouts.application')

{{-- Pass "client" to the layout --}}
@php
    $link = 'client';
@endphp

@section('content')
<div class="mx-auto max-w-screen-2xl">
    <div class="h-full mx-auto max-w-screen-xl">
        {{-- UPPER PART --}}
        <x-header.upper-part header="Approval" />

        {{-- Middle Part --}}
        <div class="">
            <div class="h-auto relative bg-white m-10 p-10 flex gap-8" style="box-shadow: 0 20px 30px -5px rgba(0, 0, 0, 0.3); border-radius: 8px;">
                <div>
                    <ul class="space-y-4 font-semibold">
                        <li>Project Name:</li>
                        <li>Designation:</li>
                        <li>Google Drive Link:</li>
                        <li>Date:</li>
                        <li>Client Name:</li>
                    </ul>
                </div>
                <div>
                    <ul class="space-y-4">
                        <li>{{ $project->project_name }}</li>
                        <li>Graphic Designer</li>
                        <li>
                            {{$project->description}}
                        </li>
                        <li>{{ $project->created_at->format('F d, Y') }}</li>
                        <li>{{ $project->client->name ?? 'Unknown' }}</li> 
                    </ul>

                    {{-- Signature Upload Section --}}
                    <div class="mt-6 bg-white p-4 rounded-md shadow-md">
                        <div class="flex justify-between">
                            <h1 class="text-sm font-semibold">Please leave your e-signature below:</h1>
                            <div class="flex">
                                <div class="px-2 border">
                                    <i class="fa-solid fa-pencil"></i>
                                </div>
                                <div class="px-2 border">
                                    <i class="fa-solid fa-file"></i>
                                </div>
                            </div>
                        </div>

                        
                        <form action="{{ route('client.projectdev.form.approval.approve', $project->id) }}" method="POST" enctype="multipart/form-data" id="approvalForm">
                            @csrf
                            @method('PUT')
                            
                            {{-- File Upload --}}
                            <input type="file" name="signature_client" accept="image/*" required class="mt-2 border p-2 rounded-md" id="signatureInput">

                            {{-- Image Preview --}}
                            <div class="mt-4 w-52 h-32 border border-gray-300 rounded-md overflow-hidden flex items-center justify-center bg-gray-100">
                                <img id="imagePreview" src="#" alt="Selected Image" class="hidden w-full h-full object-cover">
                            </div>
                            
                            {{-- Checkbox for Agreement --}}
                            <div class="mt-4 flex items-center space-x-2">
                                <input type="checkbox" id="agree" required>
                                <label for="agree">I agree to the terms and conditions.</label>
                            </div>

                            {{-- Submit Button --}}
                            <button type="submit" class="mt-4 px-4 py-2 text-sm text-white bg-orange-500 rounded hover:bg-orange-600 disabled:opacity-50 disabled:cursor-not-allowed" id="submitBtn">
                                Submit Approval
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- Live Preview of Selected Image --}}
<script>
    document.getElementById('signatureInput').addEventListener('change', function(event) {
        const file = event.target.files[0]; // Get the selected file
        const preview = document.getElementById('imagePreview'); // Get the image preview element

        if (file) {
            const reader = new FileReader();

            reader.onload = function(e) {
                preview.src = e.target.result; // Set the image preview source to the file data
                preview.classList.remove('hidden'); // Make the preview image visible
            };

            reader.readAsDataURL(file); // Read the file as a data URL
        } else {
            preview.src = '#'; // Reset the image source
            preview.classList.add('hidden'); // Hide the preview image
        }
    });

    // Disable submit button until checkbox is checked
    document.getElementById('agree').addEventListener('change', function() {
        document.getElementById('submitBtn').disabled = !this.checked;
    });
</script>

@endsection
