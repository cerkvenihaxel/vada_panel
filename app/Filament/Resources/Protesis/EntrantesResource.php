<?php

namespace App\Filament\Resources\Protesis;

use App\Filament\Resources\Protesis\EntrantesDetallesResource\RelationManagers\EntrantesRelationManager;
use App\Filament\Resources\Protesis\EntrantesResource\Pages;
use App\Filament\Resources\Protesis\EntrantesResource\RelationManagers;
use App\Models\Protesis\Entrantes;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class EntrantesResource extends Resource
{
    protected static ?string $model = Entrantes::class;

    protected static ?string $navigationIcon = 'heroicon-o-inbox';

    protected static ?string $navigationGroup = 'Convenio Prótesis';




    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Datos del afiliado')
            ->schema([
                Forms\Components\Select::make('afiliados_id')
                 ->relationship('afiliados', 'nombre')
                    ->required()
                    ->searchable()
                    ->preload(),
                Forms\Components\Select::make('estado_pacientes_id')
                ->relationship('estado_pacientes', 'estado')
                ->required()
                ->searchable()
                ->label('Estado del paciente')
                ]),
                Forms\Components\Section::make('Datos para cirugía')
            ->schema([
                Forms\Components\Select::make('clinicas_id')
                    ->relationship('clinicas', 'nombre')
                    ->required()
                    ->searchable()
                    ->preload(),
                Forms\Components\Select::make('estado_solicitud_id')
                ->relationship('estado_solicitud', 'estado')
                ->required()
                ->searchable(),
                Forms\Components\DatePicker::make('fecha_cirugia')
                    ->required(),
                Forms\Components\Select::make('medicos_id')
                    ->relationship('medicos', 'nombre')
                    ->searchable()
                    ->preload(),
                Forms\Components\TextInput::make('nro_solicitud')
                    ->required(),
                Forms\Components\Section::make('Detalles de Artículos')
                    ->schema([
                        Forms\Components\HasManyRepeater::make('detalles')
                            ->relationship('detalles')
                            ->schema([
                                Forms\Components\Select::make('articulos_id')
                                    ->relationship('articles', 'des_articulo')
                                    ->searchable()
                                    ->required()
                                    ->label('Seleccione el artículo'),
                                Forms\Components\TextInput::make('cantidad')
                                    ->numeric()
                                    ->required(),
                            ])
                            ->columns(2)
                            ->label('Detalles'),
                    ]),
                Forms\Components\Textarea::make('observaciones')
                    ->required()
                    ->columnSpanFull()

            ])->columns(2),



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
                Forms\Components\TextInput::make('user_stamps')
                    ->disabled(true)
                    ->label('Usuario de carga'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('afiliados_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('clinicas_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('estado_pacientes_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('estado_solicitud_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('fecha_cirugia')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('medicos_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('nro_solicitud')
                    ->searchable(),
                Tables\Columns\TextColumn::make('file_1')
                    ->searchable(),
                Tables\Columns\TextColumn::make('file_2')
                    ->searchable(),
                Tables\Columns\TextColumn::make('file_3')
                    ->searchable(),
                Tables\Columns\TextColumn::make('file_4')
                    ->searchable(),
                Tables\Columns\TextColumn::make('user_stamps')
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
            EntrantesRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListEntrantes::route('/'),
            'create' => Pages\CreateEntrantes::route('/create'),
            'edit' => Pages\EditEntrantes::route('/{record}/edit'),
        ];
    }
}
