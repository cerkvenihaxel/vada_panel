<?php

namespace App\Filament\Resources\Protesis\EntrantesResource\Pages;

use App\Filament\Resources\Protesis\EntrantesResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditEntrantes extends EditRecord
{
    protected static string $resource = EntrantesResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
