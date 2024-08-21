<?php

namespace App\Filament\Resources\ClinicasResource\Pages;

use App\Filament\Resources\ClinicasResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListClinicas extends ListRecords
{
    protected static string $resource = ClinicasResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
