<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Quiz') }}
            </h2>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="{{route('quiz.store')}}" method="POST"> @csrf
                        <div class="mb-4">
                            <label for="name" class="lms-label">Name</label>
                            <input type="text" name="name" id="name" class="lms-input">
                        </div>
                        <button type="submit" class="lms-button">Add</button>
                    </form>
                </div>
                <div class="py-4 px-6">
                    <livewire:quiz-index />
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
