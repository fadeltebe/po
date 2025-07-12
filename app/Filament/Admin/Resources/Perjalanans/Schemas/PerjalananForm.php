<?php

namespace App\Filament\Admin\Resources\Perjalanans\Schemas;

use App\Models\Rute;
use Filament\Schemas\Schema;
use function Laravel\Prompts\select;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\TimePicker;

class PerjalananForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                select::make('mobil_id')
                    ->relationship('mobil', 'plat_nomor')
                    ->required(),
                select::make('driver_id')
                    ->relationship('driver', 'nama')
                    ->required(),
                Select::make('rute_id')
                    ->label('Rute')
                    ->options(function () {
                        $lokasiId = \App\Models\Lokasi::where('user_id', auth()->id())->value('id');

                        return Rute::where('lokasi_asal_id', $lokasiId)
                            ->with(['lokasiAsal', 'lokasiTujuan'])
                            ->get()
                            ->mapWithKeys(function ($rute) {
                                return [$rute->id => $rute->lokasiAsal->nama . ' → ' . $rute->lokasiTujuan->nama];
                            });
                    })

                    ->required(),
                DatePicker::make('tanggal_berangkat')
                    ->required(),
                TimePicker::make('jam_berangkat')
                    ->required(),
                Select::make('status')
                    ->options([
                        'Dijadwalkan' => 'Dijadwalkan',
                        'Berangkat' => 'Berangkat',
                        'Tiba' => 'Tiba',
                        'Dibatalkan' => 'Dibatalkan',
                    ])
                    ->default('dijadwalkan')
                    ->required(),
            ]);
    }
}
