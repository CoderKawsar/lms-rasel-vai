<div>
    {{-- lead edit form --}}
    <form wire:submit.prevent="submitForm" class="mb-6">
        <div class="flex -mx-4 mb-4">
            <div class="flex-1 px-4">
                <label for="" class="lms-label">Name</label>
                <input type="text" wire:model.lazy="name" class="lms-input" />
                @error('name')
                <div class="text-red-500 text-sm">{{$message}}</div>
                @enderror
            </div>
            <div class="flex-1 px-4">
                <label for="" class="lms-label">Phone</label>
                <input type="tel" wire:model.lazy="phone" class="lms-input" />
                @error('phone')
                <div class="text-red-500 text-sm">{{$message}}</div>
                @enderror
            </div>
            <div class="flex-1 px-4">
                <label for="" class="lms-label">Email</label>
                <input type="email" wire:model.lazy="email" class="lms-input" />
                @error('email')
                <div class="text-red-500 text-sm">{{$message}}</div>
                @enderror
            </div>
        </div>
        @include('components.wire-loading-btn')
    </form>

    {{-- showing all notes --}}
    <x-show-notes :notes="$notes" />

    {{-- add note --}}
    <x-add-note />
</div>
