<?php

namespace App\Filament\Admin\Resources\Tikets\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class TiketForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('travel_id')
                    ->required()
                    ->numeric(),
                TextInput::make('pemesanan_id')
                    ->required()
                    ->numeric(),
                TextInput::make('penumpang_id')
                    ->required()
                    ->numeric(),
                TextInput::make('kursi_nomor')
                    ->required(),
                TextInput::make('harga')
                    ->required()
                    ->numeric(),
                Select::make('status')
                    ->options(['aktif' => 'Aktif', 'batal' => 'Batal', 'checkin' => 'Checkin', 'selesai' => 'Selesai'])
                    ->default('aktif')
                    ->required(),
                Textarea::make('catatan')
                    ->columnSpanFull(),
            ]);
    }
}
