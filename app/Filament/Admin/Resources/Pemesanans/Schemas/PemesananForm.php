<?php

namespace App\Filament\Admin\Resources\Pemesanans\Schemas;

use App\Models\Penumpang;
use Illuminate\Support\Str;
use Filament\Schemas\Schema;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Forms\Components\DatePicker;

class PemesananForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Informasi Pemesanan')->schema([
                    TextInput::make('kode')
                        ->required()
                        ->maxLength(20)
                        ->default(fn() => 'PM-' . strtoupper(Str::random(6)))
                        ->disabled(),

                    DatePicker::make('tanggal')
                        ->required()
                        ->default(now()),
                ]),

                Section::make('Tiket Penumpang')->schema([
                    Repeater::make('tikets')
                        ->relationship()
                        ->schema([
                            Select::make('penumpang_id')
                                ->label('Penumpang')
                                ->searchable()
                                ->preload()
                                ->getSearchResultsUsing(
                                    fn(string $query) =>
                                    Penumpang::where('nama', 'like', "%{$query}%")
                                        ->limit(50)
                                        ->pluck('nama', 'id')
                                )
                                ->getOptionLabelUsing(
                                    fn($value) =>
                                    Penumpang::find($value)?->nama
                                )
                                ->required(),

                            TextInput::make('kursi_nomor')
                                ->label('No Kursi')
                                ->required(),

                            TextInput::make('harga')
                                ->numeric()
                                ->required(),

                            Select::make('status')
                                ->options([
                                    'aktif' => 'Aktif',
                                    'batal' => 'Batal',
                                ])
                                ->default('aktif')
                                ->required(),
                        ])
                        ->label('Daftar Tiket')
                        ->minItems(1)
                        ->createItemButtonLabel('Tambah Penumpang'),
                ]),
            ]);
    }
}
