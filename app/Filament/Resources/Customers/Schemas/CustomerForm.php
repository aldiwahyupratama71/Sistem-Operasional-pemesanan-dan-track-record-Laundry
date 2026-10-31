<?php

namespace App\Filament\Resources\Customers\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class CustomerForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->required(),
                TextInput::make('phone')
                    ->tel()
                    ->required(),
                Textarea::make('address')
                    ->default(null)
                    ->columnSpanFull(),
                TextInput::make('email')
                    ->label('Email address')
                    ->email()
                    ->default(null),
                DatePicker::make('birth_date'),
                Select::make('gender')
                    ->options(['male' => 'Male', 'female' => 'Female'])
                    ->default(null),
                Toggle::make('member')
                    ->required(),
                TextInput::make('point')
                    ->required()
                    ->numeric()
                    ->default(0),
            ]);
    }
}
