<?php

namespace App\Http\Livewire;

use App\Models\Course;
use App\Models\Curriculum;
use Livewire\Component;

class CourseCreate extends Component
{
    public $name;
    public $slug;
    public $description;
    public $price;
    public $days = [
        'sunday',
        'monday',
        'tuesday',
        'wednesday',
        'thursday',
        'friday',
        'saturday',
    ];
    public $time;
    public $end_date;
    public $selectedDays = [];

    public $rules = [
        'name' => 'required|unique:courses,name',
        'description' => 'required',
    ];

    public function render()
    {
        return view('livewire.course-create');
    }

    public function formSubmit(){
        $this->validate();

        $course = Course::create([
            'name' => $this->name,
            'slug' => $this->name,
            'description' => $this->description,
            'image' => 'https://source.unsplash.com/f77Bh3inUpE',
            'price' => $this->price,
            'end_date' => $this->end_date,
            'user_id' => auth()->user()->id
        ]);

        $start_date = date('Y-m-d H:i:s');
        $end_date = $this->end_date;
        $start_ts = strtotime($start_date);
        $end_ts = strtotime($end_date);
//        $foundDays = array();

        for ($i = $start_ts; $i <= $end_ts; $i += 86400) {
            foreach ($this->selectedDays as $selectedDay){
                if(in_array($selectedDay, $this->days)){
                    if (date("w", $i) == array_search($selectedDay, $this->days)) {
//                        $foundDays[] = date("Y-m-d", $i);
                        Curriculum::create([
                            'name' => $this->name . '#'. $i++,
                            'week_day' => $selectedDay,
                            'class_time' => $this->time,
                            'course_id' => $course->id
                        ]);
                    }
                }
            }
        }

        $this->name = '';
        $this->description = '';
        $this->price = '';
        $this->selectedDays = [];
        $this->time = '';
        $this->end_date = '';

        flash()->addSuccess('Course Added Successfully!');
    }
}
