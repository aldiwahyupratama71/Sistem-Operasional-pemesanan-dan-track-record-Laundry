<?php

namespace App\Filament\Widgets;

use App\Models\Expense;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget;
use Filament\Tables\Columns\TextColumn;

class LatestExpenses extends TableWidget
{
    protected static ?string $heading = 'Pengeluaran Terbaru';

    protected static ?int $sort = 5; // ✅ Tampil setelah LatestTransactions

    protected int|string|array $columnSpan = 'half'; // ✅ Setengah lebar

    public function table(Table $table): Table
    {
        return $table
            ->query(
                Expense::query()->latest('entry_date')->latest('id')->limit(5)
            )
            ->columns([
                TextColumn::make('name')
                    ->label('Nama Pengeluaran'),
                TextColumn::make('amount')
                    ->label('Jumlah')
                    ->money('IDR'),
                TextColumn::make('entry_date')
                    ->label('Tanggal')
                    ->date(),
            ]);
    }
}