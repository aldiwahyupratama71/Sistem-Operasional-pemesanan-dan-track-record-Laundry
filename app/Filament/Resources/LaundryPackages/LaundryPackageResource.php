<?php

namespace App\Filament\Resources\LaundryPackages;

use App\Models\LaundryPackage;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Toggle;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\IconColumn;
use Filament\Actions\EditAction;
use Filament\Actions\DeleteAction;
use App\Filament\Resources\LaundryPackages\Pages\ListLaundryPackages;
use App\Filament\Resources\LaundryPackages\Pages\CreateLaundryPackage;
use App\Filament\Resources\LaundryPackages\Pages\EditLaundryPackage;
use UnitEnum;
use BackedEnum;

class LaundryPackageResource extends Resource
{
    protected static ?string $model = LaundryPackage::class;

    protected static BackedEnum|string|null $navigationIcon = 'heroicon-o-tag'; // sesuaikan icon
    
    protected static UnitEnum|string|null $navigationGroup = 'Laundry Management';
    
    protected static ?string $navigationLabel = 'Laundry Packages';

    protected static ?string $recordTitleAttribute = 'name';

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')->required(),
                TextInput::make('price')->numeric()->required(),
                Select::make('unit')->options([
                    'kg'  => 'Kilogram',
                    'pcs' => 'Pieces',
                ])->required(),
                TextInput::make('estimated_days')->numeric()->default(1)->required(),
                Textarea::make('description'),
                Toggle::make('is_active')->default(true),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')->searchable(),
                TextColumn::make('price')->money('IDR'),
                TextColumn::make('unit')->badge(),
                TextColumn::make('estimated_days')->suffix(' Hari'),
                IconColumn::make('is_active')->boolean(),
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
            'index'  => ListLaundryPackages::route('/'),
            'create' => CreateLaundryPackage::route('/create'),
            'edit'   => EditLaundryPackage::route('/{record}/edit'),
        ];
    }
}