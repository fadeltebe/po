<?php

namespace App\Filament\Admin\Resources\Perjalanans\Schemas;

use App\Models\Rute;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use function Laravel\Prompts\select;
use Illuminate\Support\Facades\Auth;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\TimePicker;
use Filament\Forms\Components\ToggleButtons;

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
                        $query = Rute::query();

                        if (is_admin()) {
                            $query->whereHas('lokasiAsal', function ($q) {
                                $q->where('branch_id', auth()->user()->branch_id);
                            });
                        }

                        return $query->get()->mapWithKeys(function ($rute) {
                            $asal = $rute->lokasiAsal->nama ?? 'Asal tidak ditemukan';
                            $tujuan = $rute->lokasiTujuan->nama ?? 'Tujuan tidak ditemukan';
                            return [$rute->id => "{$asal} → {$tujuan}"];
                        });
                    })
                    ->searchable()
                    ->preload()
                    ->required(),
                DatePicker::make('tanggal_berangkat')
                    ->required(),
                TimePicker::make('jam_berangkat')
                    ->required(),
                ToggleButtons::make('status')
                    ->options([
                        'Dijadwalkan' => 'Dijadwalkan',
                        'Berangkat' => 'Berangkat',
                        'Tiba' => 'Tiba',
                        'Dibatalkan' => 'Dibatalkan',
                    ])
                    ->colors([
                        'Dijadwalkan' => 'info',
                        'Berangkat' => 'warning',
                        'Tiba' => 'success',
                        'Dibatalkan' => 'danger',
                    ])->icons([
                        'Dijadwalkan' => Heroicon::OutlinedClock,
                        'Berangkat' => Heroicon::Truck,
                        'Tiba' => Heroicon::OutlinedCheckCircle,
                        'Dibatalkan' => Heroicon::XCircle,
                    ])->inline()

                    ->default('Dijadwalkan')
                    ->required()
                    ->grouped(),
            ]);
    }
}
