<?php

namespace App\Filament\Admin\Resources\Perjalanans\Tables;

use Filament\Tables\Table;
use Filament\Actions\Action;
use Filament\Facades\Filament;
use Illuminate\Support\Carbon;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Actions\ActionGroup;
use Filament\Tables\Filters\Filter;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Tables\Columns\TextColumn;

use Filament\Tables\Columns\BadgeColumn;
use Filament\Forms\Components\DatePicker;
use Filament\Tables\Columns\Layout\Split;

use Filament\Tables\Columns\Layout\Stack;
use Illuminate\Database\Eloquent\Builder;
use Filament\Tables\Actions\HeaderActionsPosition;

use Malzariey\FilamentDaterangepickerFilter\Filters\DateRangeFilter;


class PerjalanansTable
{
    public static function configure(Table $table): Table
    {
        // $tanggal = request('tanggal', now()->toDateString());

        return $table
            // ->modifyQueryUsing(function (Builder $query) {
            //     $tanggalAwal = request('tanggal_awal');
            //     $tanggalAkhir = request('tanggal_akhir');
            //     $tanggal = request('tanggal', now()->toDateString());

            //     if ($tanggalAwal && $tanggalAkhir) {
            //         $query->whereBetween('tanggal_berangkat', [$tanggalAwal, $tanggalAkhir]);
            //     } else {
            //         $query->whereDate('tanggal_berangkat', $tanggal);
            //     }

            //     $query->orderByDesc('tanggal_berangkat');
            // })
            ->columns([
                Split::make([
                    // Kolom 1: Rute & Status
                    Stack::make([
                        TextColumn::make('ruteDisplay')
                            ->label('Rute')
                            ->getStateUsing(
                                fn($record) =>
                                $record->rute?->lokasiAsal?->nama . ' → ' . $record->rute?->lokasiTujuan?->nama
                            ),
                        TextColumn::make('driver.nama')
                            ->label('Sopir'),
                        TextColumn::make('mobil.plat_nomor')
                            ->label('Mobil'),
                    ]),

                    // Kolom 2: Driver & Mobil
                    // Stack::make([]),

                    // Kolom 3: Berangkat & Tiba
                    Stack::make([
                        TextColumn::make('waktu_berangkat')
                            ->label('Berangkat')
                            ->getStateUsing(
                                fn($record) =>
                                $record->tanggal_berangkat && $record->jam_berangkat
                                    ? Carbon::parse($record->tanggal_berangkat)->format('d M Y') . ' ' . Carbon::parse($record->jam_berangkat)->format('H:i')
                                    : '-'
                            ),
                        TextColumn::make('waktu_tiba')
                            ->label('Tiba')
                            ->getStateUsing(
                                fn($record) =>
                                $record->tanggal_tiba && $record->jam_tiba
                                    ? Carbon::parse($record->tanggal_tiba)->format('d M Y') . ' ' . Carbon::parse($record->jam_tiba)->format('H:i')
                                    : '-'
                            ),
                        BadgeColumn::make('status')
                            ->label('Status')
                            ->colors([
                                'gray' => 'Dijadwalkan',
                                'info' => 'Berangkat',
                                'success' => 'Tiba',
                                'primary' => 'Selesai',
                                'danger' => 'Dibatalkan',
                            ])
                            ->icons([
                                'heroicon-o-clock' => 'Dijadwalkan',
                                'heroicon-o-truck' => 'Berangkat',
                                'heroicon-o-check-circle' => 'Tiba',
                                'heroicon-o-check-badge' => 'Selesai',
                                'heroicon-o-x-circle' => 'Dibatalkan',
                            ]),

                    ]),
                ]),
            ])
            ->recordActions([

                \Filament\Actions\EditAction::make()->color('primary'),
                \Filament\Actions\ViewAction::make()->color('primary'),


            ])
            ->toolbarActions([
                // \Filament\Actions\BulkActionGroup::make([
                //     \Filament\Actions\DeleteBulkAction::make(),
                // ]),
            ])

            // ->headerActions([
            //     Action::make('prevDate')
            //         ->label('<')
            //         ->url(fn() => request()->url() . '?tanggal=' . Carbon::parse(request('tanggal', now()))->subDay()->toDateString())
            //         ->openUrlInNewTab(false)
            //         ->color('info'),

            //     Action::make('displayDate')
            //         ->label(fn() => Carbon::parse(request('tanggal', now()))->translatedFormat('l, d F Y'))
            //         ->disabled()
            //         ->color('info'),

            //     Action::make('nextDate')
            //         ->label('>')
            //         ->url(fn() => request()->url() . '?tanggal=' . Carbon::parse(request('tanggal', now()))->addDay()->toDateString())
            //         ->openUrlInNewTab(false)
            //         ->color('info'),

            //     Action::make('filterTanggal')
            //         ->icon('heroicon-o-calendar-days')
            //         ->label('')
            //         ->modalHeading('Pilih Rentang Tanggal')
            //         ->form([
            //             DatePicker::make('tanggal_awal')
            //                 ->label('Tanggal Awal')
            //                 ->default(now()->startOfMonth())
            //                 ->required(),

            //             DatePicker::make('tanggal_akhir')
            //                 ->label('Tanggal Akhir')
            //                 ->default(now()->endOfMonth())
            //                 ->required(),
            //         ])
            //         ->action(function (array $data): void {
            //             $tenant = Filament::getTenant();

            //             if (! $tenant) {
            //                 abort(404, 'Tenant tidak ditemukan');
            //             }

            //             $url = route('filament.admin.resources.perjalanans.index', [
            //                 'tenant' => $tenant,
            //                 'tanggal_awal' => Carbon::parse($data['tanggal_awal'])->toDateString(),
            //                 'tanggal_akhir' => Carbon::parse($data['tanggal_akhir'])->toDateString(),
            //             ]);

            //             redirect($url);
            //         })
            //         ->color('danger'),
            // ])

            // ->headerActionsPosition(HeaderActionsPosition::Bottom)


            ->filters([
                // Filter::make('tanggal')
                //     ->query(function ($query) use ($tanggal) {
                //         return $query->whereDate('tanggal_berangkat', $tanggal);
                //     }),
                // DateRangePicker::make('created_at'),
                DateRangeFilter::make('tanggal_berangkat')


            ]);
        // ->defaultSort('jam_berangkat');
    }
}
