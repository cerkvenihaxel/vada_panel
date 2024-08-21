<?php

namespace App\Filament\Resources\Protesis\EntrantesDetallesResource\Pages;

use App\Filament\Resources\Protesis\EntrantesDetallesResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListEntrantesDetalles extends ListRecords
{
    protected static string $resource = EntrantesDetallesResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
