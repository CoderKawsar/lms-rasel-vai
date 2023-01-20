<div>
    <table class="w-full table-auto">
        <tr>
            <th class="border px-4 py-2 text-left">Name</th>
            <th class="border px-4 py-2 text-left">Email</th>
            <th class="border px-4 py-2 text-left">Phone</th>
            <th class="border px-4 py-2">Registered</th>
            <th class="border px-4 py-2">Actions</th>
        </tr>
        <tbody>
        @foreach($courses as $course)
            <tr>
                <td class="border px-4 py-2">{{$course->name}}</td>
                <td class="border px-4 py-2">{{$course->email}}</td>
                <td class="border px-4 py-2">{{$course->phone}}</td>
                <td class="border px-4 py-2 text-center">{{date('F j, Y', strtotime($course->created_at))}}</td>
                <td class="border px-4 py-2 flex justify-center items-center">
                    <a href="{{route('course.edit', $course->id)}}">
                        @include('components.icons.edit')
                    </a>
                    <a href="{{route('course.show', $course->id)}}" class="px-2">
                        @include('components.icons.eye')
                    </a>
                    <form onsubmit="return confirm('Are you sure?')" wire:submit.prevent="delete({{$course->id}})" class="flex items-center">
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
        {{$courses->links()}}
    </div>
</div>
