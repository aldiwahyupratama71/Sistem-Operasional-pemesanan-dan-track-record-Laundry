<?php

namespace App\Filament\Resources\Transactions\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class TransactionForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('invoice')
                    ->required(),
                TextInput::make('customer_id')
                    ->required()
                    ->numeric(),
                TextInput::make('laundry_package_id')
                    ->required()
                    ->numeric(),
                TextInput::make('weight')
                    ->required()
                    ->numeric(),
                TextInput::make('price')
                    ->required()
                    ->numeric()
                    ->prefix('$'),
                TextInput::make('total_price')
                    ->required()
                    ->numeric()
                    ->prefix('$'),
                Select::make('status')
                    ->options([
            'pending' => 'Pending',
            'washing' => 'Washing',
            'drying' => 'Drying',
            'ironing' => 'Ironing',
            'done' => 'Done',
            'picked_up' => 'Picked up',
        ])
                    ->default('pending')
                    ->required(),
                Select::make('payment_status')
                    ->options(['unpaid' => 'Unpaid', 'paid' => 'Paid'])
                    ->default('unpaid')
                    ->required(),
                DatePicker::make('entry_date')
                    ->required(),
                DatePicker::make('finish_date'),
                Textarea::make('notes')
                    ->default(null)
                    ->columnSpanFull(),
            ]);
    }
}
