<?php

namespace App\Http\Livewire;

use App\Models\Invoice;
use Livewire\Component;

class InvoiceIndex extends Component
{
    public function render()
    {
        $invoices = Invoice::paginate(10);
        return view('livewire.invoice-index', [
            'invoices' => $invoices
        ]);
    }

    public function deleteInvoice($id){
        $invoice = Invoice::findOrFail($id);
        $invoice->delete();

        flash()->addSuccess('Invoice item of '. $invoice->user->name. ' deleted!');
    }
}
