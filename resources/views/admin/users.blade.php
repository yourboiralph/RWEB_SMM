@extends('layouts.application')

{{-- Pass "client" to the layout --}}
@php
    $link = 'operations';
@endphp

@section('content')
<div class="mx-auto max-w-screen-2xl">
    <div class="h-full mx-auto max-w-screen-xl">
        {{-- UPPER PART --}}
        <x-header.upper-part header="Instruction Manual" />
        @foreach ($users as $user)
            <p>{{ $user->name }}</p>
        @endforeach
    </div>
</div>
@endsection