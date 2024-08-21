<?php

namespace App\Filament\Resources\AfiliadosResource\Pages;

use App\Filament\Resources\AfiliadosResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListAfiliados extends ListRecords
{
    protected static string $resource = AfiliadosResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
