<form wire:submit.prevent="changeUserInfo" class="relative">
    <input type="{{$type == 'name' ? 'text' : 'email'}}" wire:model="model" name="model" class="w-full border-0 rounded pr-12">
    <div class="absolute top-2 right-4">
        <button type="submit">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="green" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" />
            </svg>
        </button>
    </div>
</form>
