<div>
    <h3 class="font-semibold text-lg">Quizzes:</h3>
    @foreach($quizzes as $quiz)
    <h5 class="p-2 my-2 border shadow">{{$quiz->name}}</h5>
    @endforeach
</div>
