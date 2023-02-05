<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Class') }}
            </h2>
            <a href="{{route('class.create')}}" class="lms-button">Add a Class</a>
        </div>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <livewire:curriculum-create  :course_id="$course_id" />
            </div>
        </div>
    </div>
</x-app-layout>
