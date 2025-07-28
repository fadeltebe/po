<?php

namespace App\Filament\Resources\Rutes\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class RutesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('travel_id')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('lokasi_asal_id')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('lokasi_tujuan_id')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('jarak_km')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('estimasi_jam')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('harga_default')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
