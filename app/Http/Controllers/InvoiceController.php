<?php

namespace App\Http\Controllers;

use App\Models\Transaction;

use Barryvdh\DomPDF\Facade\Pdf;

class InvoiceController extends Controller
{
    public function download($id)
    {
        $transaction = Transaction::findOrFail($id);

        $pdf = Pdf::loadView(
            'invoices.transaction',
            compact('transaction')
        );

        return $pdf->download(
            $transaction->invoice . '.pdf'
        );
    }
}