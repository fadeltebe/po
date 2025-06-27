<?php

namespace App\Filament\Resources\Pakets\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class PaketForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('nama')
                    ->required(),
                TextInput::make('max_armada')
                    ->required()
                    ->numeric()
                    ->default(0),
                TextInput::make('max_lokasi')
                    ->required()
                    ->numeric()
                    ->default(0),
                TextInput::make('harga_per_bulan')
                    ->numeric(),
            ]);
    }
}
