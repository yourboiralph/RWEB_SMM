<x-navbar>
    {{-- UPPER PART --}}
    <x-header.upper-part name="{{ $auth->name ?? '???' }}" header="Job Order" />

    {{-- Main Content --}}
    <hr>
    <div class="m-10 px-6">
        <form action="#">
            <div>
                <label class="block">Job Order Name</label>
                <input type="text" name="job_name" class="border p-2 w-full rounded-md">
            </div>
            <div class="mt-4">
                <label class="block">Job Order Details</label>
                <textarea name="job_description" class="border p-2 w-full rounded-md resize-none"></textarea>
            </div>
            <div class="mt-4">
                <label class="block">Worked by</label>
                <select name="worked_by" class="border p-2 w-full rounded-md">
                    <option value="">Select Employee</option>
                    <option value="employee1">Employee 1</option>
                    <option value="employee2">Employee 2</option>
                    <option value="employee3">Employee 3</option>
                </select>
            </div>
            <div class="mt-4">
                <label class="block">Deadline</label>
                <input type="date" class="border p-2 w-full rounded-md" name="target_date">
            </div>
        </form>
    </div>
</x-navbar>
