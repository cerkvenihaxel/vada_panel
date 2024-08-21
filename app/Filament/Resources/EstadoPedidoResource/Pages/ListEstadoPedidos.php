<?php

namespace App\Filament\Resources\EstadoPedidoResource\Pages;

use App\Filament\Resources\EstadoPedidoResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListEstadoPedidos extends ListRecords
{
    protected static string $resource = EstadoPedidoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
