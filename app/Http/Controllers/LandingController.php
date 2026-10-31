<?php

namespace App\Http\Controllers;

use App\Models\LaundryPackage;
use App\Models\Transaction;

class LandingController extends Controller
{
    public function index()
    {
        $packages = LaundryPackage::where('is_active', true)->get();
        return view('landing', compact('packages'));
    }

    public function track($invoice)
    {
        $transaction = Transaction::with(['customer', 'laundryPackage'])
            ->where('invoice', $invoice)
            ->first();

        if (!$transaction) {
            return response()->json([
                'success' => false,
                'message' => 'Kode pesanan tidak ditemukan.'
            ], 404);
        }

        // Mask customer name for privacy (e.g. "Budi Santoso" -> "B**i S*****o")
        $rawName = $transaction->customer->name;
        $nameParts = explode(' ', $rawName);
        $maskedParts = array_map(function($part) {
            $len = strlen($part);
            if ($len <= 2) return $part;
            return $part[0] . str_repeat('*', $len - 2) . $part[$len - 1];
        }, $nameParts);
        $maskedName = implode(' ', $maskedParts);

        return response()->json([
            'success' => true,
            'invoice' => $transaction->invoice,
            'customer' => $maskedName,
            'package' => $transaction->laundryPackage->name,
            'weight' => $transaction->weight,
            'total_price' => number_format($transaction->total_price, 0, ',', '.'),
            'status' => $transaction->status,
            'payment_status' => $transaction->payment_status,
            'entry_date' => $transaction->entry_date,
            'finish_date' => $transaction->finish_date,
            'id' => $transaction->id,
        ]);
    }
}