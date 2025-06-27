<?php

namespace App\Filament\Admin\Resources\Mobils\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class MobilForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('plat_nomor')
                    ->required(),
                TextInput::make('merk')
                    ->required(),
                TextInput::make('tipe')
                    ->required(),
                TextInput::make('tahun')
                    ->required(),
                TextInput::make('warna'),
                TextInput::make('kapasitas_kursi')
                    ->required()
                    ->numeric(),
                TextInput::make('no_rangka')
                    ->required(),
                TextInput::make('no_mesin')
                    ->required(),
                Select::make('status')
                    ->options(['aktif' => 'Aktif', 'nonaktif' => 'Nonaktif'])
                    ->default('aktif')
                    ->required(),
            ]);
    }
}
