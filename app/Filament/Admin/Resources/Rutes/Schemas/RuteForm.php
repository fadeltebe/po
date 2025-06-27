<?php

namespace App\Filament\Admin\Resources\Rutes\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class RuteForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('lokasi_asal_id')
                    ->required()
                    ->numeric(),
                TextInput::make('lokasi_tujuan_id')
                    ->required()
                    ->numeric(),
                TextInput::make('jarak_km')
                    ->numeric(),
                TextInput::make('estimasi_jam')
                    ->numeric(),
                TextInput::make('harga_default')
                    ->numeric(),
            ]);
    }
}
