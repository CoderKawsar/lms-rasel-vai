<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Lead') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 text-lg">
                    <p class="mb-4"><span class="font-bold">Name: </span>{{$lead->name}}</p>
                    <p class="mb-4"><span class="font-bold">Email: </span>{{$lead->email}}</p>
                    <p class="mb-4"><span class="font-bold">Phone: </span>{{$lead->phone}}</p>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
