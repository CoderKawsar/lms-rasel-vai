<form wire:submit.prevent="addCurriculum" class="mx-auto p-4 text-gray-800">
    <div class="mb-4">
        <label for="curriculum_name" class="lms-label">Class/Curriculum Name</label>
        <input type="text" wire:model.lazy="curriculum_name" id="curriculum_name" class="lms-input" placeholder="Class/Curriculum Name" />
    </div>
    <div class="mb-4">
        <label for="curriculum_name" class="lms-label">Week days</label>
        <select wire:model.lazy="day">
            @foreach ($weekdays as $weekday)
                <option value="{{$weekday}}">{{ucfirst($weekday)}}</option>
            @endforeach
        </select>
    </div>
    <div class="mb-4">
        <label for="course_id" class="lms-label">Class Time</label>
        <input type="time" wire:model.lazy="class_time" id="course_id" class="lms-input" />
    </div>
    <button type="submit" class="lms-button">Add Class</button>
</form>
