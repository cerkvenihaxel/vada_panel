<?php

namespace App\Filament\Resources;

use App\Filament\Resources\EstadoSolicitudResource\Pages;
use App\Filament\Resources\EstadoSolicitudResource\RelationManagers;
use App\Models\EstadoSolicitud;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class EstadoSolicitudResource extends Resource
{
    protected static ?string $model = EstadoSolicitud::class;

    protected static ?string $navigationIcon = 'heroicon-o-clock';

    protected static ?string $navigationLabel = 'Estado de Solicitudes';

    protected static ?string $label = 'Estado de Solicitudes';

    protected static ?int $navigationSort = 3;


    protected static ?string $navigationGroup = 'Parametrización';


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('estado')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('estado')
                    ->searchable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListEstadoSolicituds::route('/'),
            'create' => Pages\CreateEstadoSolicitud::route('/create'),
            'edit' => Pages\EditEstadoSolicitud::route('/{record}/edit'),
        ];
    }
}
