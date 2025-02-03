@extends('layouts.application')

{{-- Pass "client" to the layout --}}
@php
    $link = 'operations';
@endphp

@section('content')
    <div class="mx-auto max-w-screen-2xl">
        {{-- UPPER PART --}}
        <x-header.upper-part header="Job Order" />

        {{-- Main Content --}}
        <hr>
        <div class="m-10 px-6">
            try
        </div>
    </div>
@endsection
