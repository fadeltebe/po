<?php

namespace App\Filament\Admin\Resources\Perjalanans\Tables;

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
                TextColumn::make('mobil.plat_nomor')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('driver.nama')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('ruteDisplay')
                    ->label('Rute')
                    ->getStateUsing(fn($record) => $record->rute?->lokasiAsal?->nama . ' → ' . $record->rute?->lokasiTujuan?->nama),
                TextColumn::make('tanggal_berangkat')
                    ->date()
                    ->sortable(),
                TextColumn::make('jam_berangkat')
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
