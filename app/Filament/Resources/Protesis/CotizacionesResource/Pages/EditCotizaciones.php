<?php

namespace App\Filament\Resources\Protesis\CotizacionesResource\Pages;

use App\Filament\Resources\Protesis\CotizacionesResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditCotizaciones extends EditRecord
{
    protected static string $resource = CotizacionesResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
