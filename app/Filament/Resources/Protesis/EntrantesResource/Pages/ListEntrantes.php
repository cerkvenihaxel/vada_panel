<?php

namespace App\Filament\Resources\Protesis\EntrantesResource\Pages;

use App\Filament\Resources\Protesis\EntrantesResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListEntrantes extends ListRecords
{
    protected static string $resource = EntrantesResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
