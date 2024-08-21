<?php

namespace App\Filament\Resources\Protesis;

use App\Filament\Resources\Protesis\EntrantesDetallesResource\Pages;
use App\Filament\Resources\Protesis\EntrantesDetallesResource\RelationManagers;
use App\Models\Protesis\EntrantesDetalles;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class EntrantesDetallesResource extends Resource
{
    protected static ?string $model = EntrantesDetalles::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'Convenio Prótesis';

    protected static ?int $navigationSort = 2;



    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('entrantes_id')
                    ->required()
                    ->numeric(),
                Forms\Components\Select::make('articles_id')
                    ->relationship('articles', 'des_articulo')
                    ->preload()
                    ->searchable()
                    ->required(),
                Forms\Components\TextInput::make('cantidad')
                    ->required()
                    ->numeric(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('entrantes_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('articles.des_articulo')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('cantidad')
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
            'index' => Pages\ListEntrantesDetalles::route('/'),
            'create' => Pages\CreateEntrantesDetalles::route('/create'),
            'edit' => Pages\EditEntrantesDetalles::route('/{record}/edit'),
        ];
    }
}
