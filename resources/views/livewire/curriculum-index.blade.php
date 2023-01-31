<h2 class="font-bold mb-2">Classes</h2>
<table class="w-full table-auto ">
    <tr>
        <th class="px-4 border py-2 text-left">Name</th>
        <th class="px-4 border py-2">Actions</th>
    </tr>
    @foreach($curriculums as $class)
        <tr>
            <td class="border px-4 py-2">{{$class->name}}</td>
            <td class="border px-4 py-2 flex items-center justify-center">
                <a href="{{route('class.edit', $class->id)}}">
                    @include('components.icons.edit')
                </a>
                <a href="{{route('class.show', $class->id)}}" class="mx-2">
                    @include('components.icons.eye')
                </a>
                <form onsubmit="return confirm('Are you sure?')" wire:submit.prevent="deleteClass({{$class->id}})" class="flex items-center">
                    <button type="submit">
                        @include('components.icons.delete')
                    </button>
                </form>
            </td>
        </tr>
    @endforeach
</table>
