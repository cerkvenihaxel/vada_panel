<?php

namespace App\Filament\Resources\Protesis\CotizacionesResource\Pages;

use App\Filament\Resources\Protesis\CotizacionesResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewCotizaciones extends ViewRecord
{
    protected static string $resource = CotizacionesResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
