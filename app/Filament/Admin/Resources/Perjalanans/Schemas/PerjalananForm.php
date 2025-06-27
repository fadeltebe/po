<?php

namespace App\Filament\Admin\Resources\Perjalanans\Schemas;

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
                Select::make('status')
                    ->options([
                        'dijadwalkan' => 'Dijadwalkan',
                        'berangkat' => 'Berangkat',
                        'tiba' => 'Tiba',
                        'selesai' => 'Selesai',
                        'dibatalkan' => 'Dibatalkan',
                    ])
                    ->default('dijadwalkan')
                    ->required(),
            ]);
    }
}
