<?php

namespace App\Filament\Resources\ProveedoresResource\Pages;

use App\Filament\Resources\ProveedoresResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewProveedores extends ViewRecord
{
    protected static string $resource = ProveedoresResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
