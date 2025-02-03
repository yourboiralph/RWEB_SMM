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
        <div class="h-screen">
            <div class="h-screen bg-red-500 m-10 p-10 flex gap-8">
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
                            <a href="{{ $project->description }}" target="_blank" class="text-blue-500 underline">View File</a>
                        </li>
                        <li>{{ $project->created_at->format('F d, Y') }}</li>
                        <li>{{ $project->client->name ?? 'Unknown' }}</li> 
                    </ul>

                    {{-- Signature Upload Section --}}
                    <div class="mt-6 bg-white p-4 rounded-md shadow-md">
                        <h1 class="text-lg font-semibold">Please upload your signature image below:</h1>
                        
                        <form action="{{ route('client.form.approval.approve', $project->id) }}" method="POST" enctype="multipart/form-data" id="approvalForm">
                            @csrf
                            @method('PUT')
                            
                            {{-- File Upload --}}
                            <input type="file" name="signature_client" accept="image/*" required class="mt-2 border p-2 rounded-md">
                            
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

{{-- Disable button until checkbox is checked --}}
<script>
    document.getElementById('agree').addEventListener('change', function() {
        document.getElementById('submitBtn').disabled = !this.checked;
    });
</script>

@endsection
