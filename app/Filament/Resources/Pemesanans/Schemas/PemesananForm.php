<?php

namespace App\Filament\Resources\Pemesanans\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class PemesananForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('travel_id')
                    ->required()
                    ->numeric(),
                TextInput::make('perjalanan_id')
                    ->required()
                    ->numeric(),
                TextInput::make('user_id')
                    ->numeric(),
                TextInput::make('nama_pemesan')
                    ->required(),
                TextInput::make('no_hp_pemesan')
                    ->required(),
                Select::make('status')
                    ->options(['baru' => 'Baru', 'dibayar' => 'Dibayar', 'batal' => 'Batal'])
                    ->default('baru')
                    ->required(),
                TextInput::make('total_harga')
                    ->required()
                    ->numeric(),
                Textarea::make('catatan')
                    ->columnSpanFull(),
            ]);
    }
}
