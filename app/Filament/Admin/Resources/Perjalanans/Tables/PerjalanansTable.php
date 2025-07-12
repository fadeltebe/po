<?php

namespace App\Filament\Admin\Resources\Perjalanans\Tables;

use Filament\Tables\Table;
use Illuminate\Support\Carbon;
use Filament\Actions\EditAction;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\BadgeColumn;
use Filament\Tables\Columns\Layout\Split;
use Filament\Tables\Columns\Layout\Stack;

class PerjalanansTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                Split::make([
                    // Kolom 1: Rute & Status
                    Stack::make([
                        TextColumn::make('ruteDisplay')
                            ->label('Rute')
                            ->getStateUsing(
                                fn($record) =>
                                $record->rute?->lokasiAsal?->nama . ' → ' . $record->rute?->lokasiTujuan?->nama
                            ),
                        BadgeColumn::make('status')
                            ->label('Status')
                            ->colors([
                                'gray' => 'dijadwalkan',
                                'info' => 'berangkat',
                                'success' => 'tiba',
                                'primary' => 'selesai',
                                'danger' => 'dibatalkan',
                            ])
                            ->icons([
                                'heroicon-o-clock' => 'dijadwalkan',
                                'heroicon-o-truck' => 'berangkat',
                                'heroicon-o-check-circle' => 'tiba',
                                'heroicon-o-check-badge' => 'selesai',
                                'heroicon-o-x-circle' => 'dibatalkan',
                            ])
                            ->sortable(),
                    ]),

                    // Kolom 2: Driver & Mobil
                    Stack::make([
                        TextColumn::make('driver.nama')
                            ->label('Sopir')
                            ->sortable(),
                        TextColumn::make('mobil.plat_nomor')
                            ->label('Mobil')
                            ->sortable(),
                    ]),

                    // // Kolom 3: Berangkat & Tiba
                    // Stack::make([
                    //     TextColumn::make('waktu_berangkat')
                    //         ->label('Berangkat')
                    //         ->getStateUsing(
                    //             fn($record) =>
                    //             $record->tanggal_berangkat && $record->jam_berangkat
                    //                 ? Carbon::parse($record->tanggal_berangkat)->format('d M Y') . ' ' . Carbon::parse($record->jam_berangkat)->format('H:i')
                    //                 : '-'
                    //         )
                    //         ->sortable(),
                    //     TextColumn::make('waktu_tiba')
                    //         ->label('Tiba')
                    //         ->getStateUsing(
                    //             fn($record) =>
                    //             $record->tanggal_tiba && $record->jam_tiba
                    //                 ? Carbon::parse($record->tanggal_tiba)->format('d M Y') . ' ' . Carbon::parse($record->jam_tiba)->format('H:i')
                    //                 : '-'
                    //         )
                    //         ->sortable(),
                    // ]),
                ]),
            ])
            ->recordActions([
                // \Filament\Actions\EditAction::make(),
                \Filament\Actions\ViewAction::make(),

            ])
            ->toolbarActions([
                \Filament\Actions\BulkActionGroup::make([
                    \Filament\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }
}
