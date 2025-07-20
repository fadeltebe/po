<?php

namespace App\Filament\Resources\Perjalanans\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\TimePicker;
use Filament\Schemas\Schema;

class PerjalananForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('travel_id')
                    ->required()
                    ->numeric(),
                TextInput::make('mobil_id')
                    ->required()
                    ->numeric(),
                TextInput::make('driver_id')
                    ->required()
                    ->numeric(),
                TextInput::make('rute_id')
                    ->required()
                    ->numeric(),
                DatePicker::make('tanggal_berangkat')
                    ->required(),
                TimePicker::make('jam_berangkat')
                    ->required(),
                DatePicker::make('tanggal_tiba'),
                TimePicker::make('jam_tiba'),
                Select::make('status')
                    ->options([
            'Dijadwalkan' => 'Dijadwalkan',
            'Berangkat' => 'Berangkat',
            'Tiba' => 'Tiba',
            'Dibatalkan' => 'Dibatalkan',
        ])
                    ->default('Dijadwalkan')
                    ->required(),
            ]);
    }
}
