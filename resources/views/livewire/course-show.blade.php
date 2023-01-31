<div class="mx-auto p-4 text-gray-800">
    <h1 class="font-bold mb-2 underline">
        {{$course->name}}
    </h1>
    <p class="mb-4 italic">Price: ${{$course->price}}</p>
    <p class="pb-6">{{$course->description}}</p>

    <livewire:curriculum-index :curriculums="$course->curriculums" />
</div>
