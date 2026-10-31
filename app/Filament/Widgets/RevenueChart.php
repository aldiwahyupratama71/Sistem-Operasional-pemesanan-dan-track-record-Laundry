<?php

namespace App\Filament\Widgets;

use App\Models\Transaction;
use App\Models\Expense;
use Carbon\Carbon;

use Filament\Widgets\ChartWidget;

class RevenueChart extends ChartWidget
{
    protected ?string $heading = 'Cash Flow (Pendapatan vs Pengeluaran)';

    protected function getData(): array
    {
        $revenueData = [];
        $expenseData = [];
        $currentYear = Carbon::now()->year;

        for ($month = 1; $month <= 12; $month++) {
            // Revenue this month
            $revenue = Transaction::whereMonth('created_at', $month)
                ->whereYear('created_at', $currentYear)
                ->where('payment_status', 'paid')
                ->sum('total_price');
            $revenueData[] = $revenue;

            // Expense this month
            $expense = Expense::whereMonth('entry_date', $month)
                ->whereYear('entry_date', $currentYear)
                ->sum('amount');
            $expenseData[] = $expense;
        }

        return [
            'datasets' => [
                [
                    'label' => 'Pendapatan',
                    'data' => $revenueData,
                    'borderColor' => '#10b981',
                    'backgroundColor' => 'rgba(16, 185, 129, 0.1)',
                    'fill' => 'start',
                ],
                [
                    'label' => 'Pengeluaran',
                    'data' => $expenseData,
                    'borderColor' => '#ef4444',
                    'backgroundColor' => 'rgba(239, 68, 68, 0.1)',
                    'fill' => 'start',
                ],
            ],

            'labels' => [
                'Jan',
                'Feb',
                'Mar',
                'Apr',
                'May',
                'Jun',
                'Jul',
                'Aug',
                'Sep',
                'Oct',
                'Nov',
                'Dec',
            ],
        ];
    }

    protected function getType(): string
    {
        return 'line';
    }
}