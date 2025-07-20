<?php

namespace App\Filament\Resources\Perjalanans\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class PerjalanansTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('travel_id')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('mobil_id')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('driver_id')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('rute_id')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('tanggal_berangkat')
                    ->date()
                    ->sortable(),
                TextColumn::make('jam_berangkat')
                    ->time()
                    ->sortable(),
                TextColumn::make('tanggal_tiba')
                    ->date()
                    ->sortable(),
                TextColumn::make('jam_tiba')
                    ->time()
                    ->sortable(),
                TextColumn::make('status'),
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
