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
                    <livewire:invoice-edit :invoice_id="$invoice->id" />
                    @if($invoice->amount()['due'] > 0)
                    <h2 class="font-bold mb-2">Add a payment</h2>
                    <form method="POST" action="{{route('stripe-payment')}}">@csrf
                        <div class="flex">
                            <div class="w-full">
                                <input type="number" name="card_number" class="lms-input" placeholder="Card Number" id="">
                            </div>
                            <div class="min-w-max ml-4">
                                <input type="text" name="expiry_date" class="lms-input" placeholder="Expiry month/year" id="">
                            </div>
                            <div class="min-w-max ml-4 mb-4">
                                <input type="text" name="card_ccv" class="lms-input" placeholder="CCV" id="">
                            </div>
                            <div class="min-w-max ml-4 mb-4">
                                <input type="number" max="{{$invoice->amount()['due']}}" name="amount" class="lms-input" placeholder="Amount" id="" value="{{$invoice->amount()['due']}}">
                            </div>
                            <input type="hidden" name="invoice_id" value="{{$invoice->id}}">
                            <input type="hidden" name="due" value="{{$invoice->amount()['due']}}">
                        </div>
                        <button type="submit" class="lms-button">Pay Now</button>
                    </form>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
