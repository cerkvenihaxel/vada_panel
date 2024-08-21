<?php

namespace App\Filament\Resources\Protesis\EntrantesDetallesResource\Pages;

use App\Filament\Resources\Protesis\EntrantesDetallesResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditEntrantesDetalles extends EditRecord
{
    protected static string $resource = EntrantesDetallesResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
