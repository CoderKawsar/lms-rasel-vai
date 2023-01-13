<div>
    <table class="w-full table-auto">
        <tr>
            <th class="border px-4 py-2 text-left">ID</th>
            <th class="border px-4 py-2 text-left">Name</th>
            <th class="border px-4 py-2 text-left">Email</th>
            <th class="border px-4 py-2">Registered</th>
            <th class="border px-4 py-2">Actions</th>
        </tr>
        <tbody>
        @foreach($users as $user)
            <tr>
                <td class="border px-4 py-2">{{$user->id}}</td>
                <td class="border px-4 py-2">{{$user->name}}</td>
                <td class="border px-4 py-2">{{$user->email}}</td>
                <td class="border px-4 py-2 text-center">{{date('F j, Y', strtotime($user->created_at))}}</td>
                <td class="border px-4 py-2 flex justify-center items-center">
                    <a href="{{route('user.edit', $user->id)}}">
                        @include('components.icons.edit')
                    </a>
                    <a href="{{route('lead.show', $user->id)}}" class="px-2">
                        @include('components.icons.eye')
                    </a>
                    <form onsubmit="return confirm('Are you sure?')" wire:submit.prevent="deleteLead({{$user->id}})" class="flex items-center">
                        <button type="submit">
                            @include('components.icons.delete')
                        </button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <div class="mt-4">
        {{$users->links()}}
    </div>
</div>
