<?php

namespace App\Filament\Resources\EstadoPacienteResource\Pages;

use App\Filament\Resources\EstadoPacienteResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListEstadoPacientes extends ListRecords
{
    protected static string $resource = EstadoPacienteResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
