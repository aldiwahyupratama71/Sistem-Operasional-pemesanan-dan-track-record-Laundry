<?php

namespace App\Filament\Resources\LaundryPackages\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class LaundryPackageForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->required(),
                TextInput::make('price')
                    ->required()
                    ->numeric()
                    ->prefix('$'),
                Select::make('unit')
                    ->options(['kg' => 'Kg', 'pcs' => 'Pcs'])
                    ->required(),
                TextInput::make('estimated_days')
                    ->required()
                    ->numeric()
                    ->default(1),
                Textarea::make('description')
                    ->default(null)
                    ->columnSpanFull(),
                Toggle::make('is_active')
                    ->required(),
            ]);
    }
}
