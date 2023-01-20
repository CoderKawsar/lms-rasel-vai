<form wire:submit.prevent="formSubmit">
    <div class="mb-6">
        @include('components.form-field', [
        'name' => 'name',
        'label' => 'Name',
        'type' => 'text',
        'placeholder' => "Enter name",
        'required' => 'required'
    ])
    </div>
    <div class="mb-6">
        @include('components.form-field', [
        'name' => 'description',
        'label' => 'Description',
        'type' => 'textarea',
        'placeholder' => "Enter Course Description",
        'required' => 'required'
    ])
    </div>
    <div class="mb-6">
        @include('components.form-field', [
        'name' => 'price',
        'label' => 'Price',
        'type' => 'number',
        'placeholder' => "Course Price",
        'required' => ''
    ])
    </div>
    <div class="flex items-center mb-6">
        <div class="w-full mr-4">
            <label class="lms-label" for="days">Days</label>
            <div class="flex flex-wrap -mx-4">
                @foreach($days as $day)
                    <div class="min-w-max flex items-center px-4">
                        <input wire:model.lazy="selectedDays" type="checkbox" value="{{$day}}" id="{{$day}}" class="mr-2" ><label for="{{$day}}">{{ucfirst($day)}}</label>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="min-w-max">
            <div class="mb-6">
                @include('components.form-field', [
                'name' => 'time',
                'label' => 'Time',
                'type' => 'time',
                'placeholder' => "Class Time",
                'required' => 'required'
                ])
            </div>
        </div>
        <div class="min-w-max">
            <div class="mb-6">
                @include('components.form-field', [
                'name' => 'end_date',
                'label' => 'Course End Date',
                'type' => 'date',
                'placeholder' => "Course End date",
                'required' => 'required'
                ])
            </div>
        </div>
    </div>
    @include('components.wire-loading-btn')
</form>
