<?php

namespace App\Filament\Widgets;

use App\Models\Customer;
use App\Models\Transaction;
use App\Models\Expense;
use Carbon\Carbon;

use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class LaundryStats extends StatsOverviewWidget
{
    protected function getStats(): array
    {
        // Revenue calculations
        $revenueToday = Transaction::whereDate('created_at', Carbon::today())
            ->where('payment_status', 'paid')
            ->sum('total_price');

        $revenueThisWeek = Transaction::whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])
            ->where('payment_status', 'paid')
            ->sum('total_price');

        $revenueThisMonth = Transaction::whereMonth('created_at', Carbon::now()->month)
            ->whereYear('created_at', Carbon::now()->year)
            ->where('payment_status', 'paid')
            ->sum('total_price');

        $totalRevenue = Transaction::where('payment_status', 'paid')
            ->sum('total_price');

        // Expense calculations
        $totalExpense = Expense::sum('amount');

        // Net profit
        $netProfit = $totalRevenue - $totalExpense;

        // Active laundry orders
        $activeLaundry = Transaction::whereIn('status', ['pending', 'washing', 'drying', 'ironing'])->count();

        return [
            // Baris 1: Operasional & Pendapatan Berkala
            Stat::make('Pendapatan Hari Ini', 'Rp ' . number_format($revenueToday, 0, ',', '.'))
                ->description('Total kas masuk hari ini')
                ->descriptionIcon('heroicon-m-arrow-trending-up')
                ->color('success'),

            Stat::make('Pendapatan Minggu Ini', 'Rp ' . number_format($revenueThisWeek, 0, ',', '.'))
                ->description('Total kas masuk minggu ini')
                ->color('primary'),

            Stat::make('Pendapatan Bulan Ini', 'Rp ' . number_format($revenueThisMonth, 0, ',', '.'))
                ->description('Total kas masuk bulan ini')
                ->color('info'),

            Stat::make('Cucian Aktif', $activeLaundry . ' Order')
                ->description('Cucian yang sedang diproses')
                ->descriptionIcon('heroicon-m-arrow-path')
                ->color('warning'),

            // Baris 2: Keuangan & Laba Rugi
            Stat::make('Total Pendapatan', 'Rp ' . number_format($totalRevenue, 0, ',', '.'))
                ->description('Seluruh kas masuk terbayar')
                ->color('success'),

            Stat::make('Total Pengeluaran', 'Rp ' . number_format($totalExpense, 0, ',', '.'))
                ->description('Seluruh biaya operasional')
                ->color('danger'),

            Stat::make('Keuntungan Bersih (Net Profit)', 'Rp ' . number_format($netProfit, 0, ',', '.'))
                ->description('Pendapatan dikurangi pengeluaran')
                ->descriptionIcon($netProfit >= 0 ? 'heroicon-m-check-circle' : 'heroicon-m-x-circle')
                ->color($netProfit >= 0 ? 'success' : 'danger'),
        ];
    }
}