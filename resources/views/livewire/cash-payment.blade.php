<form wire:submit.prevent="payByCash">
    <div class="mb-4">
        <input wire:model.lazy="paymentAmount" type="number" min="0" max="{{$invoice->amount()['due']}}" step=".01" class="lms-input" placeholder="Pay Now">
    </div>
    @include('components.wire-loading-btn')
</form>
