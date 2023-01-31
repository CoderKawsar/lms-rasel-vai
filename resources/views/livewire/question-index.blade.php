<di2>
    @foreach($questions as $question)
        <div class="mb-6">
            <div class="flex justify-between">
                <h3 class="mb-2"><span class="font-bold">Question: </span>{{$question->name}}</h3>
                <a href="{{route('question.edit', $question->id)}}">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="green" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                    </svg>
                </a>
            </div>
            <div class="grid gap-2 grid-cols-2">
                <div><span class="font-bold">A. </span>{{$question->answer_a}}</div>
                <div><span class="font-bold">B. </span>{{$question->answer_b}}</div>
                <div><span class="font-bold">C. </span>{{$question->answer_c}}</div>
                <div><span class="font-bold">D. </span>{{$question->answer_d}}</div>
            </div>
            <p class="mt-2"><span class="font-bold">Correct Answer: </span>{{$question->correct_answer}}</p>
        </div>
    @endforeach
</di2>
