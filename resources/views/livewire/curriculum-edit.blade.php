<div class="mx-auto p-4 text-gray-800">
    <h1 class="font-bold mb-2 underline">{{$curriculum->course->name}}</h1>
    <p class="mb-4 italic">Price: ${{$curriculum->course->price}}</p>
    <p class="pb-6">{{$curriculum->course->description}}</p>

    <h2 class="font-bold mb-2">Class</h2>
    <form class="text-gray-600 mb-4" wire:submit.prevent="changeCurriculumName">
        <label for="curriculum_name" class="font-semibold">Name:</label>
        <div class="relative">
            <input type="text" wire:model.lazy="curriculum_name" class="lms-input" id="curriculum_name" required/>
            <div class="absolute top-2.5 right-2">
                <button type="submit">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="green" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" />
                    </svg>
                </button>
            </div>
        </div>
    </form>
    <h2 class="font-bold mb-2">Students - Present - {{$curriculum->presentStudents()}} | Absent {{$curriculum->course->students()->count() - $curriculum->presentStudents()}}</h2>
    <table class="w-full table-auto">
        <tr>
            <th class="border px-4 py-2 text-left" rowspan="2">Name</th>
            <th class="border px-4 py-2 text-left" rowspan="2">Email</th>
            <th class="border px-4 py-2 text-center" colspan="2">Attendance</th>
        </tr>
        <tr>
            <th class="border px-4 py-2 text-center">Status</th>
            <th class="border px-4 py-2 text-center">Action</th>
        </tr>

        @foreach ($curriculum->course->students as $student)
            <tr>
                <td class="border pr-4 py-2">
                    @livewire('edit-user-info', ['type' => 'name', 'user' => $student])
                </td>
                <td class="border pr-4 py-2">
                    @livewire('edit-user-info', ['type' => 'email', 'user' => $student])
                </td>
                <td class="border px-4 py-2 text-center">
                    @if(isPresentInClass($student->id, $curriculum->id))
                    <p class="text-green-400">Present</p>
                    @else
                    <p class="text-red-400">Absent</p>
                    @endif
                </td>
                <td class="border px-4 py-2">
                    <div class="flex items-center justify-center gap-4">
                        @if(isPresentInClass($student->id, $curriculum->id))
                        <button wire:click="attendance({{$student->id}})" class="py-2 px-3 bg-red-500 text-white hover:bg-green-600 rounded">Make Absent</button>
                        @else
                        <button wire:click="attendance({{$student->id}})" class="py-2 px-3 bg-green-500 text-white hover:bg-green-600 rounded">Make Present</button>
                        @endif
                    </div>
                </td>
            </tr>
        @endforeach
    </table>

    <h3 class="font-bold text-lg my-4">Notes</h3>
    @if (count($curriculum->notes)>0)
        @foreach($curriculum->notes as $note)
            <livewire:edit-note :note="$note" :key="$note->id" />
        @endforeach
    @else
        <p class="py-4 text-red-400">Not Found Any Note!</p>
    @endif

    @livewire('add-note', ['attachmentModelType' => 'curriculum', 'modelId' => $curriculum->id])
</div>
