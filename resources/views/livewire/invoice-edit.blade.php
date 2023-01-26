<div>
    <h2 class="font-bold text-xl mb-4">Information</h2>
    <p class="text-lg mb-2">Invoice to: <span class="font-semibold">{{$invoice->user->name}}</span></p>
    <table class="table-auto w-full mb-4">
        <tr>
            <th class="lms-cell-border text-left">Name</th>
            <th class="lms-cell-border">Price</th>
            <th class="lms-cell-border">Quantity</th>
            <th class="lms-cell-border text-right">Total</th>
        </tr>
        @foreach($invoice->items as $item)
        <tr>
            <td class="lms-cell-border text-left">{{$item->name}}</td>
            <td class="lms-cell-border text-center">${{number_format($item->price, 2)}}</td>
            <td class="lms-cell-border text-center">{{$item->quantity}}</td>
            <td class="lms-cell-border text-right">${{number_format($item->price * $item->quantity, 2)}}</td>
        </tr>
        @endforeach
        <tr>
            <td class="lms-cell-border text-right font-semibold" colspan="3">SubTotal</td>
            <td class="lms-cell-border px-4 py-2 text-right">${{number_format($invoice->amount()['total'])}}</td>
        </tr>
        <tr>
            <td class="lms-cell-border text-right font-semibold" colspan="3">Paid</td>
            <td class="lms-cell-border px-4 py-2 text-right">- ${{number_format($invoice->amount()['paid'])}}</td>
        </tr>
        <tr>
            <td class="lms-cell-border text-right font-semibold" colspan="3">Due</td>
            <td class="lms-cell-border px-4 py-2 text-right">${{number_format($invoice->amount()['due'])}}</td>
        </tr>
    </table>
    @if(!$addFormShow)
        <button wire:click="addNewItem" class="mt-2 underline">Add Invoice Item</button>
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
    <h3 class="font-bold text-lg mt-4 mb-2">Payments</h3>
    <ul class="mb-4">
        @foreach ($invoice->payments as $payment)
            <li>{{date('F j, Y - g:i:a', strtotime($payment->created_at))}} - ${{number_format($payment->amount), 2}} paid - Transaction ID: {{$payment->transaction_id}} <button wire:click="refund({{$payment->id}})" class="bg-red-400 text-xs px-2 py-1 text-white">Refund</button></li>
        @endforeach
    </ul>
</div>
