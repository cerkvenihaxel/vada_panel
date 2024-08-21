<?php

namespace App\Filament\Resources\ClinicasResource\Pages;

use App\Filament\Resources\ClinicasResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditClinicas extends EditRecord
{
    protected static string $resource = ClinicasResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
