<?php

namespace App\Filament\Widgets;

use App\Models\Transaction;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget;
use Filament\Tables\Columns\TextColumn;

class LatestTransactions extends TableWidget
{
    protected static ?string $heading = 'Transaksi Terbaru';

    protected static ?int $sort = 4;

    protected int|string|array $columnSpan = 'half'; // ✅ Setengah lebar

    public function table(Table $table): Table
    {
        return $table
            ->query(
                Transaction::query()->latest()->limit(5)
            )
            ->columns([
                TextColumn::make('invoice')
                    ->label('Invoice')
                    ->searchable(),
                TextColumn::make('customer.name')
                    ->label('Pelanggan'),
                TextColumn::make('total_price')
                    ->label('Total')
                    ->money('IDR'),
                TextColumn::make('status')
                    ->label('Status')
                    ->badge(),
            ]);
    }
}