<?php

namespace App\Filament\Resources\LaundryPackages\Pages;

use App\Filament\Resources\LaundryPackages\LaundryPackageResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListLaundryPackages extends ListRecords
{
    protected static string $resource = LaundryPackageResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
