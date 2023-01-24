<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Invoice') }}
            </h2>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <livewire:invoice-edit :invoice_id="$invoice_id" />

                    <h2 class="font-bold mb-2">Add a payment</h2>
                    <form class="flex" method="POST" action="{{route('stripe-payment')}}">@csrf
                        <div class="w-full">
                            <input type="number" class="lms-input" placeholder="Card Number" id="">
                        </div>
                        <div class="min-w-max ml-4">
                            <input type="text" class="lms-input" placeholder="Expiry month/year" id="">
                        </div>
                        <div class="min-w-max ml-4">
                            <input type="text" class="lms-input" placeholder="CCV" id="">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
