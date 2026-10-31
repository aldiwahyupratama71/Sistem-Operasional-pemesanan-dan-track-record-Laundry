<?php

namespace App\Filament\Resources\Customers;

use App\Models\Customer;
use UnitEnum;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Toggle;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\IconColumn;
use Filament\Actions\EditAction;
use Filament\Actions\DeleteAction;
use App\Filament\Resources\Customers\Pages\ListCustomers;
use App\Filament\Resources\Customers\Pages\CreateCustomer;
use App\Filament\Resources\Customers\Pages\EditCustomer;

class CustomerResource extends Resource
{
    protected static ?string $model = Customer::class;

    protected static BackedEnum|string|null $navigationIcon = 'heroicon-o-users'; // ✅ fix

    protected static UnitEnum|string|null $navigationGroup = 'Laundry Management'; // ✅ fix

    protected static ?string $navigationLabel = 'Customers';

    protected static ?string $recordTitleAttribute = 'name';

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')->required(),
                TextInput::make('phone')->tel()->required(),
                TextInput::make('email')->email(),
                Textarea::make('address'),
                DatePicker::make('birth_date'),
                Select::make('gender')->options([
                    'male' => 'Male',
                    'female' => 'Female',
                ]),
                Toggle::make('member'),
                TextInput::make('point')->numeric()->default(0),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')->searchable(),
                TextColumn::make('phone'),
                TextColumn::make('email'),
                TextColumn::make('gender')->badge(),
                IconColumn::make('member')->boolean(),
                TextColumn::make('point'),
                TextColumn::make('created_at')->date(),
            ])
            ->recordActions([
                EditAction::make(),
                DeleteAction::make(),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index'  => ListCustomers::route('/'),
            'create' => CreateCustomer::route('/create'),
            'edit'   => EditCustomer::route('/{record}/edit'),
        ];
    }
}