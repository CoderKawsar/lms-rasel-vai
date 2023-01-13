<div>
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
    <h3 class="font-bold text-lg mb-2">Notes</h3>
    @foreach($notes as $note)
        <p class="mb-4 border border-gray-100 p-4">{{$note->description}}</p>
    @endforeach

    <h3 class="font-bold mb-2">Add Note</h3>
    <form wire:submit.prevent="addNote">
        <div class="mb-4">
            <textarea wire:model.lazy="note" class="lms-input" placeholder="Type Note"></textarea>
        </div>
        <button type="submit" class="lms-button">Add New</button>
    </form>

</div>
