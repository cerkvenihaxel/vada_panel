<?php

namespace App\Filament\Resources\MedicosResource\Pages;

use App\Filament\Resources\MedicosResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditMedicos extends EditRecord
{
    protected static string $resource = MedicosResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
