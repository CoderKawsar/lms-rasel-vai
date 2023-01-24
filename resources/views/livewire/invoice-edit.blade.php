<div>
    <h2 class="font-bold text-xl mb-4">Information</h2>
    <p class="text-lg mb-2">Invoice to: <span class="font-semibold">{{$invoice->user->name}}</span></p>
    <table class="table-auto w-full mb-4">
        <tr>
            <th class="border px-4 py-2 text-left">Name</th>
            <th class="border px-4 py-2">Price</th>
            <th class="border px-4 py-2">Quantity</th>
            <th class="border px-4 py-2 text-right">Total</th>
        </tr>
        @foreach($invoice->items as $item)
        <tr>
            <td class="border px-4 py-2 text-left">{{$item->name}}</td>
            <td class="border px-4 py-2 text-center">${{number_format($item->price, 2)}}</td>
            <td class="border px-4 py-2 text-center">{{$item->quantity}}</td>
            <td class="border px-4 py-2 text-right">${{number_format($item->price * $item->quantity, 2)}}</td>
        </tr>
        @endforeach
    </table>
    @if(!$addFormShow)
        <button wire:click="addNewItem" class="mt-2 underline">Add</button>
    @else
    <form wire:submit.prevent="saveNewItem">
        <div class="flex mb-4">
            <div class="w-full">
                @include('components.form-field', [
                    'name' => 'name',
                    'placeholder' => 'Items Name',
                    'label' => 'Item Name',
                    'type' => 'text',
                    'required' => 'required'
                ])
            </div>
            <div class="min-w-max ml-4">
                @include('components.form-field', [
                    'name' => 'price',
                    'placeholder' => 'Items Price',
                    'label' => 'Item Price',
                    'type' => 'number',
                    'required' => 'required'
                ])
            </div>
            <div class="min-w-max ml-4">
                @include('components.form-field', [
                    'name' => 'quantity',
                    'placeholder' => 'Quantity',
                    'label' => 'Quantity',
                    'type' => 'number',
                    'required' => 'required'
                ])
            </div>
        </div>
        @include('components.wire-loading-btn')
        <button type="button" wire:click="addNewItem" class="mt-2 underline">Cancel</button>
    </form>
    @endif
</div>
