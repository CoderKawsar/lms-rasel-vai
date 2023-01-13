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

    <h3 class="font-semibold mt-6 mb-2">Permissions</h3>
    <p>
        {{var_dump($selectedPermissions)}}
    </p>
    <div class="flex flex-wrap -mx-4">
        @foreach($permissions as $permission)
            <div class="w-1/3 px-4 mb-2">
                <label for="permissions" class="inline-flex items-center">
                    <input wire:model="selectedPermissions" type="checkbox" id="permissions" value="{{$permission->name}}">
                    <span class="ml-2">{{$permission->name}}</span>
                </label>
            </div>
        @endforeach
        @error('selectedPermissions')
        <div class="text-red-500 text-sm px-4 mb-6">{{$message}}</div>
        @enderror
    </div>

    @include('components.wire-loading-btn')
</form>
