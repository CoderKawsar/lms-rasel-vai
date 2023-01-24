<form wire:submit.prevent="submitForm">
    <div class="mb-4">
        @include('components.form-field', [
            'name' => 'name',
            'label' => 'Question',
            'type' => 'text',
            'placeholder' => 'Type Question',
            'required' => 'required'
        ])
        @error('name')
        <p class="text-red mb-2">{{$message}}</p>
        @enderror
    </div>
    @foreach($answers as $answer)
    <div class="mb-4">
        @include('components.form-field', [
            'name' => 'answer_'.$answer,
            'label' => 'Answer '.ucfirst($answer),
            'type' => 'text',
            'placeholder' => 'Type Answer '.ucfirst($answer),
            'required' => 'required'
        ])
        @error('answer_'.$answer)
        <p class="text-red mb-2">{{$message}}</p>
        @enderror
    </div>
    @endforeach
    <div class="mb-4">
        <label class="lms-label" for="correct_answer">Correct Answer</label>
        <select wire:model.prevent="correct_answer" id="correct_answer" class="lms-input">
            @foreach($answers as $answer)
                <option value="{{$answer}}">{{ucfirst($answer)}}</option>
            @endforeach
        </select>
    </div>
    @include('components.wire-loading-btn')
</form>
