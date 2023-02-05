<?php

namespace App\Http\Livewire;

use Livewire\Component;

class CashPayment extends Component
{
    public $paymentAmount;

    public function render()
    {
        return view('livewire.cash-payment');
    }

    public function payByCash(){

    }
}
