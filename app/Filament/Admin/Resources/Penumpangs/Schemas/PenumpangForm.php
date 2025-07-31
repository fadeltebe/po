<?php

namespace App\Filament\Admin\Resources\Penumpangs\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class PenumpangForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('travel_id')
                    ->required()
                    ->numeric(),
                TextInput::make('nama')
                    ->required(),
                TextInput::make('nik'),
                TextInput::make('no_hp'),
                Textarea::make('alamat')
                    ->columnSpanFull(),
                Toggle::make('is_langganan')
                    ->required(),
            ]);
    }
}
