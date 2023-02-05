<div>
    <h2 class="font-bold mb-2 text-lg">Questions</h2>
    <ul class="mb-2">
        @foreach($quiz->questions as $question)
            <li class="border px-4 py-2 mb-2">{{$question->name}}</li>
        @endforeach
    </ul>

    @if(count($questions) > 0)
    <h2 class="font-bold mb-2 text-lg">Add Question</h2>
    <form wire:submit.prevent="addQuestion">
        <div class="mb-4">
            <label for="question_id" class="lms-label">Question</label>
            <select wire:model.lazy="question_id" id="question_id" class="lms-input">
                <option>Select a question</option>
                @foreach($questions as $question)
                    <option value="{{$question->id}}">{{$question->name}}</option>
                @endforeach
            </select>
        </div>
        @include('components.wire-loading-btn')
    </form>
    @else
    <p class="text-green-400">No questions available!</p>
    @endif
</div>
