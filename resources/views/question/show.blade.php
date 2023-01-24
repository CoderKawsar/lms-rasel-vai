<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Course') }}
            </h2>
            <a href="{{route('course.create')}}" class="lms-button">Add a Course</a>
        </div>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="mx-auto p-4 text-gray-800">
                    <h1 class="font-bold mb-2 underline">
                        {{$course->name}}
                    </h1>
                    <p class="mb-4 italic">Price: ${{$course->price}}</p>
                    <p class="pb-6">{{$course->description}}</p>

                    <h2 class="font-bold">Classes</h2>
                    <table class="w-full table-auto ">
                        <tr>
                            <th class="px-4 border py-2 text-left">Name</th>
                            <th class="px-4 border py-2">Actions</th>
                        </tr>
                        @foreach($course->curriculums as $class)
                            <tr>
                                <td class="border px-4 py-2">{{$class->name}}</td>
                                <td class="border px-4 py-2 flex items-center justify-center">
                                    <a href="{{route('class.edit', $course->id)}}">
                                        @include('components.icons.edit')
                                    </a>
                                    <a href="{{route('class.show', $class->id)}}" class="mx-2">
                                        @include('components.icons.eye')
                                    </a>
                                    <form onsubmit="return confirm('Are you sure?')" wire:submit.prevent="delete({{$class->id}})" class="flex items-center">
                                        <button type="submit">
                                            @include('components.icons.delete')
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
