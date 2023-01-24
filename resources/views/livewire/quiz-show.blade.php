<div>
    <span class="bg-red-300 bg-green-300"></span>
    @foreach($quiz->questions as $question)
        <div class="mb-4 @if(array_key_exists($question->id, $answered))bg-{{$answered[$question->id] ? 'green-300' : 'red-300'}} @endif">
            <h3 class="font-bold">{{$question->name}}</h3>
            <div class="flex">
                <div class="mr-2">
                    <input wire:model="answer" value="a,{{$question->id}}" wire:change.prevent="check" type="radio" id="{{'answer_a'.$question->id}}" @if(array_key_exists($question->id, $answered)) disabled @endif >
                    <label for="{{'answer_a'.$question->id}}">{{$question->answer_a}}</label>
                </div>
                <div class="mr-2">
                    <input wire:model="answer" value="b,{{$question->id}}" wire:change.prevent="check" type="radio" id="{{'answer_b'.$question->id}}" @if(array_key_exists($question->id, $answered)) disabled @endif >
                    <label for="{{'answer_b'.$question->id}}">{{$question->answer_b}}</label>
                </div>
                <div class="mr-2">
                    <input wire:model="answer" value="c,{{$question->id}}" wire:change.prevent="check" type="radio" id="{{'answer_c'.$question->id}}" @if(array_key_exists($question->id, $answered)) disabled @endif >
                    <label for="{{'answer_c'.$question->id}}">{{$question->answer_c}}</label>
                </div>
                <div class="mr-2">
                    <input wire:model="answer" value="d,{{$question->id}}" wire:change.prevent="check" type="radio" id="{{'answer_d'.$question->id}}" @if(array_key_exists($question->id, $answered)) disabled @endif >
                    <label for="{{'answer_d'.$question->id}}">{{$question->answer_d}}</label>
                </div>
            </div>
        </div>
    @endforeach
</div>
