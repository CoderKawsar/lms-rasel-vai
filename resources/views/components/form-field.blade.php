<label for="{{$name}}" class="lms-label">{{$label}}</label>

@if($type == 'textarea')
    <textarea type="{{$type}}" wire:model.lazy="{{$name}}" id="{{$name}}" placeholder="{{$placeholder}}" class="lms-input" {{$required}} /></textarea>
@elseif($type == 'number')
    <input type="{{$type}}" wire:model.lazy="{{$name}}" step=".01" id="{{$name}}" placeholder="{{$placeholder}}" class="lms-input" {{$required}} >
@else
    <input type="{{$type}}" wire:model.lazy="{{$name}}" id="{{$name}}" placeholder="{{$placeholder}}" class="lms-input" {{$required}} >
@endif

@error($name)
<div class="text-red-500 text-sm">{{$message}}</div>
@enderror


