<?php

namespace App\Http\Livewire;

use App\Models\Invoice;
use Livewire\Component;
use Livewire\WithPagination;

class InvoiceIndex extends Component
{
    public function render()
    {
        $invoices = Invoice::paginate(10);
        return view('livewire.invoice-index', [
            'invoices' => $invoices
        ]);
    }
}
