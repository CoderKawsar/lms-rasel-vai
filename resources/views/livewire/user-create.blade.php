<form wire:submit.prevent="submitForm" class="mb-6">
    <div class="flex -mx-4 mb-4">
        <div class="flex-1 px-4">
            <label for="name" class="lms-label">Name</label>
            <input type="text" wire:model.lazy="name" id="name" class="lms-input" />
            @error('name')
            <div class="text-red-500 text-sm">{{$message}}</div>
            @enderror
        </div>
    </div>
    <div class="flex -mx-4 mb-4">
        <div class="flex-1 px-4">
            <label for="email" class="lms-label">Email</label>
            <input type="email" wire:model.lazy="email" id="email" class="lms-input" />
            @error('email')
            <div class="text-red-500 text-sm">{{$message}}</div>
            @enderror
        </div>
    </div>
    <div class="flex -mx-4 mb-4">
        <div class="flex-1 px-4">
            <label for="password" class="lms-label">Password</label>
            <input type="password" wire:model.lazy="password" id="password" class="lms-input" />
            @error('password')
            <div class="text-red-500 text-sm">{{$message}}</div>
            @enderror
        </div>
    </div>

    <div class="mb-4">
        <label for="role" class="lms-label">Role</label>
        <select wire:model.lazy="role" id="role" class="lms-input">
            <option value="Select Role">Select Role</option
            @foreach($roles as $role)
                <option value="{{$role->id}}">{{$role->name}}</option>
            @endforeach
        </select>
        @error('role')
        <div class="text-red-500 text-sm">{{$message}}</div>
        @enderror
    </div>

    @include('components.wire-loading-btn')
</form>
