<x-navbar>
    {{-- UPPER PART --}}
    <x-header.upper-part name="{{$auth->name}}" header="Project" />

    {{-- Main Content --}}
    <hr>
    <div class="m-10">@foreach ($projects as $project )
        <p>{{$project->project_name}}</p>
    @endforeach</div>
</x-navbar>
