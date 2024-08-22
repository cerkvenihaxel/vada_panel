<?php

namespace App\Filament\Resources\Protesis;

use App\Filament\Resources\Protesis\CotizacionesResource\Pages;
use App\Filament\Resources\Protesis\CotizacionesResource\RelationManagers;
use App\Models\Protesis\Cotizaciones;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CotizacionesResource extends Resource
{
    protected static ?string $model = Cotizaciones::class;

    protected static ?string $navigationIcon = 'heroicon-o-document-currency-dollar';

    protected static ?string $navigationGroup = 'Convenio Prótesis';

    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('entrantes_id')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('nro_solicitud'),
                Forms\Components\Select::make('estado_solicitud_id')
                    ->relationship('estado_solicitud', 'estado')
                    ->searchable()
                    ->preload()
                    ->required(),
                Forms\Components\Select::make('estado_pedido_id')
                    ->relationship('estado_pedido', 'estado')
                    ->searchable()
                    ->preload()
                    ->required(),
                Forms\Components\DatePicker::make('fecha_limite'),

                Forms\Components\Section::make('Detalles de cotización')
                    ->schema([
                        Forms\Components\HasManyRepeater::make('detalles')
                            ->relationship('detalles')
                            ->schema([
                                Forms\Components\Select::make('articles_id')
                                    ->relationship('articles', 'des_articulo')
                                    ->searchable()
                                    ->preload()
                                    ->required()
                                    ->label('Seleccione el artículo'),
                                Forms\Components\TextInput::make('cantidad')
                                    ->numeric()
                                    ->required(),
                                Forms\Components\TextInput::make('garantia')
                                ->required(),
                                Forms\Components\TextInput::make('precio_unitario')
                                ->required(),
                                Forms\Components\TextInput::make('subtotal')
                                ->required(),
                                Forms\Components\Select::make('procedencia')
                                ->options([
                                    'Nacional',
                                    'Importada'
                                ]),
                                Forms\Components\TextInput::make('marca'),
                            ])
                            ->columns(2)
                            ->label('Detalles'),
                    ]),


                Forms\Components\Textarea::make('observaciones')
                    ->columnSpanFull(),

                Forms\Components\Section::make('Suba de archivos')
                    ->schema([
                        Forms\Components\FileUpload::make('file_1')
                            ->label('Archivo 1'),
                        Forms\Components\FileUpload::make('file_2')
                            ->label('Archivo 2'),
                        Forms\Components\FileUpload::make('file_3')
                            ->label('Archivo 3'),
                        Forms\Components\FileUpload::make('file_4')
                            ->label('Archivo 4'),
                    ])->columns(2),

                Forms\Components\Select::make('proveedores_id')
                    ->relationship('proveedores', 'nombre')
                    ->searchable()
                    ->preload()
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable(),
                Tables\Columns\TextColumn::make('nro_solicitud')
                    ->searchable(),
                Tables\Columns\TextColumn::make('fecha_limite')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('estado_solicitud.estado')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('estado_pedido.estado')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('proveedores.nombre')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
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
            'index' => Pages\ListCotizaciones::route('/'),
            'create' => Pages\CreateCotizaciones::route('/create'),
            'view' => Pages\ViewCotizaciones::route('/{record}'),
            'edit' => Pages\EditCotizaciones::route('/{record}/edit'),
        ];
    }
}
