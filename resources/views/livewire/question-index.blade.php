<di2>
    @foreach($questions as $question)
        <div class="mb-6">
            <h3 class="mb-2"><span class="font-bold">Question: </span>{{$question->name}}</h3>
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
