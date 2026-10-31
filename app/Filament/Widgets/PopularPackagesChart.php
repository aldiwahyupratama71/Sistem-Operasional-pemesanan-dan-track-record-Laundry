<?php

namespace App\Filament\Widgets;

use App\Models\LaundryPackage;
use Filament\Widgets\ChartWidget;

class PopularPackagesChart extends ChartWidget
{
    protected ?string $heading = 'Paket Laundry Terpopuler';

    protected function getData(): array
    {
        $packages = LaundryPackage::withCount('transactions')
            ->orderByDesc('transactions_count')
            ->limit(5)
            ->get();

        $labels = $packages->pluck('name')->toArray();
        $data = $packages->pluck('transactions_count')->toArray();

        return [
            'datasets' => [
                [
                    'label' => 'Jumlah Transaksi',
                    'data' => $data,
                    'backgroundColor' => [
                        '#3b82f6', // blue
                        '#10b981', // green
                        '#f59e0b', // amber
                        '#ef4444', // red
                        '#8b5cf6', // violet
                    ],
                ],
            ],
            'labels' => $labels,
        ];
    }

    protected function getType(): string
    {
        return 'doughnut';
    }
}
