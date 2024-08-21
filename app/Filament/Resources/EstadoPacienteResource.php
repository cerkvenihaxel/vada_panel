<?php

namespace App\Filament\Resources;

use App\Filament\Resources\EstadoPacienteResource\Pages;
use App\Filament\Resources\EstadoPacienteResource\RelationManagers;
use App\Models\EstadoPaciente;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class EstadoPacienteResource extends Resource
{
    protected static ?string $model = EstadoPaciente::class;

    protected static ?string $navigationIcon = 'heroicon-o-user';

    protected static ?string $navigationLabel = 'Estado del Paciente';

    protected static ?string $label = 'Estado del Paciente';
    protected static ?string $navigationGroup = 'Parametrización';

    protected static ?int $navigationSort = 5;



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
            'index' => Pages\ListEstadoPacientes::route('/'),
            'create' => Pages\CreateEstadoPaciente::route('/create'),
            'edit' => Pages\EditEstadoPaciente::route('/{record}/edit'),
        ];
    }
}
