<form wire:submit.prevent="editQuestion" action="{{route('question.edit', $question->id)}}">
    <h3 class="mb-8 flex items-center">
        <span class="font-bold mr-3">Question: </span>
        <input type="text" wire:model.lazy="question_name" class="lms-input focus:ring-0">
    </h3>
    <div class="grid gap-4 grid-cols-2">
        @for($i = ord("a"); $i <= ord("d"); $i++)
        <div class="flex items-center">
            <span class="font-bold mr-2">{{strToUpper(chr($i))}}. </span>
            <input type="text" wire:model.lazy="answer_{{chr($i)}}" class="lms-input focus:ring-0">
        </div>
        @endfor
    </div>
    <p class="my-4">
        <span class="font-bold">Present Correct Answer: </span>{{strToUpper($question->correct_answer)}}
    </p>
    <div class="flex items-center">
        <label class="font-bold" for="correct_answer">New Correct Answer</label>
        <select wire:model.prevent="correct_answer" id="correct_answer" class="lms-input">
            @for($i = ord("a"); $i <= ord("d"); $i++)
                <option value="{{chr($i)}}">{{ucfirst(chr($i))}}</option>
            @endfor
        </select>
    </div>
    <div class="flex justify-end mt-6">
        <button type="submit" class="lms-button">Update Question</button>
    </div>
</form>
