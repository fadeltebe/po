<?php

namespace App\Filament\Admin\Resources\Lokasis\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class LokasiForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('nama')
                    ->required(),
                TextInput::make('user_id')
                    ->required()
                    ->numeric(),
            ]);
    }
}
