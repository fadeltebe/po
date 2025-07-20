<?php

namespace App\Filament\Resources\Admins\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class AdminForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('user_id')
                    ->required()
                    ->numeric(),
                TextInput::make('travel_id')
                    ->required()
                    ->numeric(),
                TextInput::make('agen_id')
                    ->required()
                    ->numeric(),
                TextInput::make('nama')
                    ->required(),
                TextInput::make('nik'),
                TextInput::make('nomor_hp')
                    ->required(),
                Textarea::make('alamat')
                    ->columnSpanFull(),
                Select::make('status')
                    ->options(['aktif' => 'Aktif', 'nonaktif' => 'Nonaktif'])
                    ->default('aktif')
                    ->required(),
            ]);
    }
}
