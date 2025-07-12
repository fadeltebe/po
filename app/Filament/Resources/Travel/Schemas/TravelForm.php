<?php

namespace App\Filament\Resources\Travel\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class TravelForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->required(),
                TextInput::make('slug'),
                TextInput::make('owner_nama')
                    ->required(),
                TextInput::make('owner_hp')
                    ->required(),
                Textarea::make('alamat')
                    ->columnSpanFull(),
                TextInput::make('paket_id')
                    ->numeric(),
                DatePicker::make('tanggal_aktif')
                    ->required(),
                DatePicker::make('tanggal_berakhir')
                    ->required(),
                TextInput::make('status')
                    ->required()
                    ->default('aktif'),
            ]);
    }
}
