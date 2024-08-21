<?php

namespace App\Filament\Resources\EstadoPedidoResource\Pages;

use App\Filament\Resources\EstadoPedidoResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditEstadoPedido extends EditRecord
{
    protected static string $resource = EstadoPedidoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
