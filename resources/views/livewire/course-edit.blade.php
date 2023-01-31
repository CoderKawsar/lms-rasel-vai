<div>
    <div class="mb-4">
        <label for="name" class="font-bold">Course Name: </label>
        <input type="text" value="{{$course->name}}" id="name" class="lms-input mt-2">
    </div>
    <div class="mb-4">
        <label for="price" class="font-bold">Course Price: </label>
        <input type="number" value="{{$course->price}}" id="price" class="lms-input mt-2" min="0">
    </div>
    <div class="mb-4">
        <label for="name" class="font-bold">Course Description: </label>
        <textarea type="name" id="name" class="lms-input mt-2">{{$course->description}}</textarea>
    </div>

    <livewire:curriculum-index :curriculums="$course->curriculums"/>
</div>
