<?php

namespace App\Filament\Resources\Transactions;

use App\Models\Transaction;
use App\Models\LaundryPackage;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Textarea;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn; // ✅ BadgeColumn dihapus, pakai TextColumn->badge()
use Filament\Actions\EditAction;
use Filament\Actions\DeleteAction;
use App\Filament\Resources\Transactions\Pages\ListTransactions;
use App\Filament\Resources\Transactions\Pages\CreateTransaction;
use App\Filament\Resources\Transactions\Pages\EditTransaction;
use UnitEnum;
use BackedEnum;

class TransactionResource extends Resource
{
    protected static ?string $model = Transaction::class;

protected static BackedEnum|string|null $navigationIcon = 'heroicon-o-tag'; // sesuaikan icon
protected static UnitEnum|string|null $navigationGroup = 'Laundry Management';

    protected static ?string $navigationLabel = 'Transactions';

    protected static ?string $recordTitleAttribute = 'invoice';

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('customer_id')
                    ->relationship('customer', 'name')
                    ->searchable()
                    ->required(),

                Select::make('laundry_package_id')
                    ->relationship('laundryPackage', 'name')
                    ->searchable()
                    ->required()
                    ->live()
                    ->afterStateUpdated(function ($state, callable $set) {
                        $package = LaundryPackage::find($state);
                        if ($package) {
                            $set('price', $package->price);
                        }
                    }),

                TextInput::make('weight')
                    ->numeric()
                    ->required()
                    ->live(onBlur: true)
                    ->afterStateUpdated(function ($state, callable $get, callable $set) {
                        $price = $get('price');
                        if ($price) {
                            $set('total_price', $state * $price);
                        }
                    }),

                TextInput::make('price')->numeric()->required(),

                TextInput::make('total_price')->numeric()->disabled(),

                Select::make('status')
                    ->options([
                        'pending'   => 'Pending',
                        'washing'   => 'Washing',
                        'drying'    => 'Drying',
                        'ironing'   => 'Ironing',
                        'done'      => 'Done',
                        'picked_up' => 'Picked Up',
                    ])
                    ->default('pending'),

                Select::make('payment_status')
                    ->options([
                        'unpaid' => 'Unpaid',
                        'paid'   => 'Paid',
                    ])
                    ->default('unpaid'),

                DatePicker::make('entry_date')->required(),
                DatePicker::make('finish_date'),
                Textarea::make('notes'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('invoice')->searchable(),
                TextColumn::make('customer.name')->searchable(),
                TextColumn::make('laundryPackage.name'),
                TextColumn::make('weight')->suffix(' Kg'),
                TextColumn::make('total_price')->money('IDR'),
                TextColumn::make('status')->badge(),         // ✅ ganti BadgeColumn
                TextColumn::make('payment_status')->badge(), // ✅ ganti BadgeColumn
                TextColumn::make('entry_date')->date(),
            ])
            ->recordActions([
                EditAction::make(),
                DeleteAction::make(),
                \Filament\Actions\Action::make('invoice')
                    ->label('Download Invoice')
                    ->icon('heroicon-o-document-arrow-down')
                    ->url(fn ($record) => url('/invoice/' . $record->id))
                    ->openUrlInNewTab(),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index'  => ListTransactions::route('/'),
            'create' => CreateTransaction::route('/create'),
            'edit'   => EditTransaction::route('/{record}/edit'),
        ];
    }
}