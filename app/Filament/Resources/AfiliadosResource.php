<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AfiliadosResource\Pages;
use App\Filament\Resources\AfiliadosResource\RelationManagers;
use App\Models\Afiliados;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class AfiliadosResource extends Resource
{
    protected static ?string $model = Afiliados::class;

    protected static ?string $navigationIcon = 'heroicon-o-users';

    protected static ?string $navigationGroup = 'Obra Social - Administración';


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('identificador_afiliado')
                    ->required(),
                Forms\Components\TextInput::make('nombre')
                    ->required(),
                Forms\Components\TextInput::make('apellido')
                    ->required(),
                Forms\Components\TextInput::make('documento')
                    ->required(),
                Forms\Components\TextInput::make('telefono')
                    ->tel()
                    ->required(),
                Forms\Components\TextInput::make('sexo'),
                Forms\Components\TextInput::make('email')
                    ->email(),
                Forms\Components\TextInput::make('provincia'),
                Forms\Components\TextInput::make('localidad'),
                Forms\Components\Select::make('obras_sociales_id')
                    ->relationship('obrasSociales', 'nombre'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('identificador_afiliado')
                    ->searchable(),
                Tables\Columns\TextColumn::make('nombre')
                    ->searchable(),
                Tables\Columns\TextColumn::make('apellido')
                    ->searchable(),
                Tables\Columns\TextColumn::make('documento')
                    ->searchable(),
                Tables\Columns\TextColumn::make('telefono')
                    ->searchable(),
                Tables\Columns\TextColumn::make('sexo')
                    ->searchable(),
                Tables\Columns\TextColumn::make('email')
                    ->searchable(),
                Tables\Columns\TextColumn::make('provincia')
                    ->searchable(),
                Tables\Columns\TextColumn::make('localidad')
                    ->searchable(),
                Tables\Columns\TextColumn::make('obrasSociales.nombre')
                    ->numeric()
                    ->sortable(),
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
            'index' => Pages\ListAfiliados::route('/'),
            'create' => Pages\CreateAfiliados::route('/create'),
            'edit' => Pages\EditAfiliados::route('/{record}/edit'),
        ];
    }
}
