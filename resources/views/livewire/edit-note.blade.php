<form class="mb-4 relative" wire:submit.prevent="editNote">
    <input class="w-full border border-gray-100 p-4 pr-12" wire:model="noteDesc" />
    <button type="submit" class="absolute top-4 right-10">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="green" class="w-6 h-6 absolute">
            <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" />
        </svg>
    </button>
</form>
