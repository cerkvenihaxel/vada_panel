<?php

namespace App\Filament\Resources\EstadoPacienteResource\Pages;

use App\Filament\Resources\EstadoPacienteResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditEstadoPaciente extends EditRecord
{
    protected static string $resource = EstadoPacienteResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
