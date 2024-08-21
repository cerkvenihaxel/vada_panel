<?php

namespace App\Filament\Resources\ObraSocialResource\Pages;

use App\Filament\Resources\ObraSocialResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewObraSocial extends ViewRecord
{
    protected static string $resource = ObraSocialResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
