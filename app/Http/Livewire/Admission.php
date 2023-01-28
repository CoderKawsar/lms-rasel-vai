<?php

namespace App\Http\Livewire;

use App\Models\Course;
use App\Models\Invoice;
use App\Models\InvoiceItem;
use App\Models\Lead;
use App\Models\Payment;
use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Str;

class Admission extends Component
{
    public $search;
    public $noLeadFound;
    public $addLead;
    public $lead_input_name;
    public $lead_input_email;
    public $lead_input_phone;
    public $leads = [];
    public $lead_id;
    public $course_id;
    public $selectedCourse;
    public $payment;

    public function render()
    {
        $courses = Course::all();
        return view('livewire.admission', [
            'courses' => $courses
        ]);
    }

    public function search(){
        $this->leads = Lead::where('name', 'like', '%'.$this->search.'%')
            ->orWhere('email', 'like', '%'.$this->search.'%')
            ->orWhere('phone', 'like', '%'.$this->search.'%')
            ->get();

        $this->noLeadFound = false;
        if(count($this->leads) === 0){
            $this->noLeadFound = true;
        }
    }

    public function addNewLeadBtn(){
        $this->addLead = !$this->addLead;
    }

    public function courseSelected(){
        $this->selectedCourse = Course::findOrFail($this->course_id);
    }

    public function admit(){
        if($this->lead_id){
            $lead = Lead::findOrFail($this->lead_id);
        }else{
            $lead = Lead::create([
                'name' => $this->lead_input_name,
                'email' => $this->lead_input_email,
                'phone' => $this->lead_input_phone
            ]);
        }

        $user = User::create([
            'name' => $lead->name,
            'email' => $lead->email,
            'password' => Str::random(8)
        ]);
        $lead->delete();

        $invoice = Invoice::create([
            'due_date' => now()->addDay(7),
            'user_id' => $user->id
        ]);

        $invoiceItem = InvoiceItem::create([
            'name' => 'Course: '.$this->selectedCourse->name,
            'price' => $this->selectedCourse->price,
            'quantity' => 1,
            'invoice_id' => $invoice->id,
        ]);

        $this->selectedCourse->students()->attach($user->id);

        if(!empty($this->payment)){
            Payment::create([
                'amount' => $this->payment,
                'invoice_id' => $invoice->id,
                'transaction_id' => Str::random(8)
            ]);
        }

        $this->search = '';
        $this->leads = [];
        $this->lead_id = '';
        $this->course_id = '';
        $this->selectedCourse = '';
        $this->lead_input_name = '';
        $this->lead_input_email = '';
        $this->lead_input_phone = '';

        flash()->addSuccess('Admission Successful!');
    }
}
