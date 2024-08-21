<?php

namespace App\Filament\Resources\EstadoSolicitudResource\Pages;

use App\Filament\Resources\EstadoSolicitudResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditEstadoSolicitud extends EditRecord
{
    protected static string $resource = EstadoSolicitudResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
