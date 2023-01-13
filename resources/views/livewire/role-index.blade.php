<div>
    <table class="w-full table-auto">
        <tr>
            <th class="border px-4 py-2 text-left">ID</th>
            <th class="border px-4 py-2 text-left">Name</th>
            <th class="border px-4 py-2 text-left">Permissions</th>
            <th class="border px-4 py-2">Actions</th>
        </tr>
        <tbody>
        @foreach($roles as $role)
            <tr>
                <td class="border px-4 py-2">{{$role->id}}</td>
                <td class="border px-4 py-2">{{$role->name}}</td>
                <td class="border px-4 py-2">
                    @foreach($role->permissions as $permission)
                    <span class="px-2 py-1 bg-blue-400 text-white rounded text-sm">{{$permission->name}}</span>
                    @endforeach
                </td>
                <td class="border px-4 py-2 flex justify-center items-center">
                    <a href="{{route('user.edit', $role->id)}}" class="mr-1">
                        @include('components.icons.edit')
                    </a>
                    <form onsubmit="return confirm('Are you sure?')" wire:submit.prevent="deleteRole({{$role->id}})" class="flex items-center">
                        <button type="submit">
                            @include('components.icons.delete')
                        </button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
