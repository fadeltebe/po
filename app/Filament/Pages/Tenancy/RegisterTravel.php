<?php

namespace App\Filament\Pages\Tenancy;

use App\Models\Travel;

use Filament\Schemas\Schema;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DatePicker;
use Filament\Pages\Tenancy\RegisterTenant;

class RegisterTravel extends RegisterTenant
{
    public static function getLabel(): string
    {
        return 'Register Travel';
    }

    public function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->label('Travel Name')
                    ->required()
                    ->maxLength(255),

                TextInput::make('owner_nama')
                    ->label('Owner Name')
                    ->required()
                    ->maxLength(255),

                TextInput::make('owner_hp')
                    ->label('Owner Phone')
                    ->required()
                    ->maxLength(15),

                TextInput::make('alamat')
                    ->label('Address')
                    ->required()
                    ->maxLength(255),

                Select::make('paket_id')
                    ->label('Package ID')
                    ->options([
                        1 => 'Package 1',
                        2 => 'Package 2',
                        // Populate this with actual package data.
                    ])
                    ->required(),

                DatePicker::make('tanggal_aktif')
                    ->label('Start Date')
                    ->required()
                    ->default(now()),

                DatePicker::make('tanggal_berakhir')
                    ->label('End Date')
                    ->required(),

                Select::make('status')
                    ->label('Status')
                    ->options([
                        'aktif' => 'Active',
                        'non-aktif' => 'Inactive',
                        'expired' => 'Expired',
                    ])
                    ->required(),
            ]);
    }

    protected function handleRegistration(array $data): Travel
    {
        $travel = Travel::create($data);

        $travel->members()->attach(auth()->user());

        return $travel;
    }
}
