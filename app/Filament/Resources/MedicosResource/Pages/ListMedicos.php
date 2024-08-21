<?php

namespace App\Filament\Resources\MedicosResource\Pages;

use App\Filament\Resources\MedicosResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListMedicos extends ListRecords
{
    protected static string $resource = MedicosResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
