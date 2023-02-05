<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use LaravelDaily\Invoices\Classes\Buyer;
use LaravelDaily\Invoices\Classes\InvoiceItem;

class InvoiceController extends Controller
{
    public function index(){
        return view('invoice.index');
    }

    public function edit($id){
        return view('user.invoice.show', [
            'invoice' => Invoice::findOrFail($id)
        ]);
    }

    public function show($id){
        $DBinvoice = Invoice::findOrFail($id);

       $customer = new Buyer([
           'name'          => $DBinvoice->user->name,
           'custom_fields' => [
               'email' => $DBinvoice->user->email,
           ],
       ]);

       $items = [];
       foreach ($DBinvoice->items as $item){
           $items[] = (new InvoiceItem())->title($item->name)->pricePerUnit($item->price)->quantity($item->quantity);
       }

       $invoice = \LaravelDaily\Invoices\Invoice::make()
           ->buyer($customer)
           ->addItems($items)
           ->currencySymbol('$')
           ->currencyCode('USD')
       ;

       return $invoice->stream();
    }

    public function genereatePDF($id){
        $invoice = Invoice::findOrFail($id);

        $pdf = Pdf::loadView('user.invoice.pdf',  [
            'invoice' => $invoice
        ]);

        return $pdf->stream();

    }

}
