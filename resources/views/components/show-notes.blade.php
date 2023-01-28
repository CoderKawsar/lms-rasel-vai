<h3 class="font-bold text-lg mb-2">Notes</h3>
@foreach($notes as $note)
    <p class="mb-4 border border-gray-100 p-4">{{$note->description}}</p>
@endforeach
