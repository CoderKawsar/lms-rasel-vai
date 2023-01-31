<div>
    <form wire:submit.prevent="search" class="flex items-center">
        <input type="text" wire:model.lazy="search" id="search" placeholder="Search" class="lms-input" required>
        <span class="ml-3"><button type="submit" class="lms-button">Search</button></span>
    </form>

    <form wire:submit.prevent="admit">
        @if(count($leads) > 0)
            <div class="mt-4">
                <select wire:model.lazy="lead_id" class="lms-input">
                    <option value="">Select Lead</option>
                    @foreach($leads as $lead)
                        <option value="{{$lead->id}}">{{$lead->name}} - {{$lead->phone}}</option>
                    @endforeach
                </select>
            </div>
        @endif

        {{-- if no lead found, add show add lead button --}}
        @if ($noLeadFound)
            @if (!$addLead)
                <p class="text-red-300">No Lead Found!</p>
                <button wire:click="addNewLeadBtn" class="lms-button mt-2" type="button">Add new lead</button>
            @endif
            {{-- when user want to add lead, show add lead form --}}
            @if ($addLead)
                <div class="mt-4 flex gap-x-8">
                    <input type="text" wire:model.lazy="lead_input_name" name="lead_input_name" placeholder="Lead Name" class="lms-input" required>
                    <input type="email" wire:model.lazy="lead_input_email" name="lead_input_email" placeholder="Email"  class="lms-input" required>
                    <input type="text" wire:model.lazy="lead_input_phone" name="lead_input_phone" placeholder="Phone"  class="lms-input" required>
                </div>
            @endif
        @endif

        @if(!empty($lead_id) || $addLead)
            <div class="mt-4 mb-4">
                <select wire:change="courseSelected" wire:model="course_id" class="lms-input">
                    <option value="select option">Select Course</option>
                    @foreach($courses as $course)
                        <option value="{{$course->id}}">{{$course->name}}</option>
                    @endforeach
                </select>
            </div>
        @endif
        @if(!empty($selectedCourse))
            <p class="mb-4">Price: {{number_format($selectedCourse->price, 2)}} </p>

            <div class="mb-4">
                <input wire:model.lazy="payment" type="number" min="0" max="{{number_format($selectedCourse->price, 2)}}" step=".01" class="lms-input" placeholder="Pay Now">
            </div>
            @include('components.wire-loading-btn')
        @endif
    </form>

</div>
