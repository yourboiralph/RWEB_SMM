<x-navbar>
    {{-- UPPER PART --}}
    <div class="grid grid-cols-3">
        <x-pagetitle header="Project" />
        <div class="bg-[#fa7011] rounded-bl-[40px] flex items-center justify-center gap-8 ml-8 mb-8">
            <h1 class="text-white">Hi, Gabby</h1>
            <img src="/Assets/user-profile.png" class="w-20" alt="" draggable="false">
            <div>
                <i class="fa-solid fa-power-off text-xl bg-white px-2 py-1 rounded-lg" style="color: #fa7011;"></i>
            </div>
        </div>
    </div>

    {{-- Main Content --}}
    <hr>
    <div class="m-10 px-6">
        <form action="#">
            <div>
                <label class="block text-sm text-[#fa7011]">Project Name</label>
                <input type="text" name="project_name" class="border p-2 w-full rounded-md">
            </div>
            <div class="mt-4">
                <label class="block text-sm text-[#fa7011]">Project Description</label>
                <textarea name="description" class="border p-2 w-full rounded-md resize-none"></textarea>
            </div>
            <div class="mt-4">
                <label class="block text-sm text-[#fa7011]">Client</label>
                <select name="client_id" class="border p-2 w-full rounded-md">
                    <option value="">Select Client</option>
                    <option value="employee1">Employee 1</option>
                    <option value="employee2">Employee 2</option>
                    <option value="employee3">Employee 3</option>
                </select>
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

</x-navbar>
