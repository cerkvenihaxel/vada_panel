<?php

namespace App\Filament\Resources\Protesis\EntrantesDetallesResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class EntrantesRelationManager extends RelationManager
{
    protected static string $relationship = 'detalles';
    protected static ?string $recordTitleAttribute = 'id';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('article_id')
                    ->relationship('article', 'des_articulo')
                    ->required()
                    ->label('Artículo'),
                Forms\Components\TextInput::make('cantidad')
                    ->numeric()
                    ->required()
                    ->label('Cantidad'),
            ]);
    }

    public function table(Table $table): Table
    {
        {
            return $table
                ->columns([
                    Tables\Columns\TextColumn::make('article.des_articulo')
                        ->label('Artículo')
                        ->sortable()
                        ->searchable(),
                    Tables\Columns\TextColumn::make('cantidad')
                        ->label('Cantidad')
                        ->sortable(),
                ])
                ->filters([
                    // Puedes agregar filtros si es necesario
                ])
                ->headerActions([
                    Tables\Actions\CreateAction::make(),
                ])
                ->actions([
                    Tables\Actions\EditAction::make(),
                    Tables\Actions\DeleteAction::make(),
                ])
                ->bulkActions([
                    Tables\Actions\DeleteBulkAction::make(),
                ]);
        }
}
}
