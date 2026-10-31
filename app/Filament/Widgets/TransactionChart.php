<?php

namespace App\Filament\Widgets;

use App\Models\Transaction;
use Carbon\Carbon;
use Filament\Widgets\ChartWidget;

class TransactionChart extends ChartWidget
{
    protected ?string $heading = 'Jumlah Transaksi per Bulan';

    protected function getData(): array
    {
        $transactionData = [];
        $paidData = [];
        $unpaidData = [];
        $currentYear = Carbon::now()->year;

        for ($month = 1; $month <= 12; $month++) {
            // Total transaksi bulan ini
            $total = Transaction::whereMonth('created_at', $month)
                ->whereYear('created_at', $currentYear)
                ->count();
            $transactionData[] = $total;

            // Transaksi yang sudah dibayar
            $paid = Transaction::whereMonth('created_at', $month)
                ->whereYear('created_at', $currentYear)
                ->where('payment_status', 'paid')
                ->count();
            $paidData[] = $paid;

            // Transaksi yang belum dibayar
            $unpaid = Transaction::whereMonth('created_at', $month)
                ->whereYear('created_at', $currentYear)
                ->where('payment_status', 'unpaid')
                ->count();
            $unpaidData[] = $unpaid;
        }

        return [
            'datasets' => [
                [
                    'label'           => 'Total Transaksi',
                    'data'            => $transactionData,
                    'borderColor'     => '#6366f1',
                    'backgroundColor' => 'rgba(99, 102, 241, 0.1)',
                    'fill'            => 'start',
                ],
                [
                    'label'           => 'Sudah Dibayar',
                    'data'            => $paidData,
                    'borderColor'     => '#10b981',
                    'backgroundColor' => 'rgba(16, 185, 129, 0.1)',
                    'fill'            => 'start',
                ],
                [
                    'label'           => 'Belum Dibayar',
                    'data'            => $unpaidData,
                    'borderColor'     => '#f59e0b',
                    'backgroundColor' => 'rgba(245, 158, 11, 0.1)',
                    'fill'            => 'start',
                ],
            ],
            'labels' => [
                'Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun',
                'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec',
            ],
        ];
    }

    protected function getType(): string
    {
        return 'line';
    }
}