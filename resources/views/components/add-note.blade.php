<h3 class="font-bold mb-2">Add Note</h3>
<form wire:submit.prevent="addNote">
    <textarea wire:model.lazy="note" name="note" class="lms-input" placeholder="Type Note" required></textarea>
    @error('note')
        <p class="text-red-400">Note can not be empty</p>
    @enderror
    <button type="submit" class="lms-button mt-4">Add New</button>
</form>
