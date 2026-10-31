<?php

namespace App\Filament\Resources\LaundryPackages\Pages;

use App\Filament\Resources\LaundryPackages\LaundryPackageResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditLaundryPackage extends EditRecord
{
    protected static string $resource = LaundryPackageResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
