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

        {{-- Middle Part --}}
        <div class="px-10 mt-20">
            <table class="table-auto w-full">
                <thead class="bg-[#fa7011]">
                  <tr>
                    <th class="text-left px-6 py-4 font-bold text-gray-700">File Name</th>
                    <th class="text-left px-6 py-4 font-bold text-gray-700">Date</th>
                  </tr>
                </thead>
                <tbody>
                  <tr class="border-t border-gray-200 hover:bg-orange-50">
                    <td class="px-6 py-4 flex items-center gap-4">
                      <img class="w-6 h-6" src="https://img.icons8.com/fluency/48/download.png" alt="Download Icon">
                      <span class="font-semibold text-[#fa7011]">RWS.031 - INSTRUCTION MANUAL - SILANGAN</span>
                    </td>
                    <td class="px-6 py-4 text-gray-600">07-06-24</td>
                  </tr>
                </tbody>
              </table>
        </div>
    </div>
</div>
@endsection
