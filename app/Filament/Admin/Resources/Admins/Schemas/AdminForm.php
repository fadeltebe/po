<?php

namespace App\Filament\Admin\Resources\Admins\Schemas;

use Illuminate\Support\Facades\DB;
use App\Models\Agen;
use App\Models\User;
use Filament\Schemas\Schema;
use Filament\Facades\Filament;
use Illuminate\Support\Facades\Hash;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;

class AdminForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema->components([
            TextInput::make('user_name')
                ->label('Nama User')
                ->required(),

            TextInput::make('user_email')
                ->label('Email User')
                ->email()
                ->unique(table: User::class, column: 'email')
                ->required(),

            TextInput::make('user_password')
                ->label('Password User')
                ->password()
                ->required(),

            Select::make('agen_id')
                ->label('Agen')
                ->options(fn() => Agen::pluck('nama', 'id'))
                ->searchable()
                ->required()
                ->createOptionForm([
                    TextInput::make('nama')->label('Nama Agen')->required(),
                    TextInput::make('alamat')->label('Alamat')->required(),
                    TextInput::make('nomor_hp')->label('Nomor HP')->required(),
                ]),

            TextInput::make('nik')
                ->label('NIK')
                ->nullable(),

            TextInput::make('nomor_hp')
                ->label('Nomor HP Admin')
                ->required(),

            Textarea::make('alamat')
                ->label('Alamat Admin')
                ->nullable(),

            Select::make('status')
                ->label('Status')
                ->options(['aktif' => 'Aktif', 'nonaktif' => 'Nonaktif'])
                ->default('aktif')
                ->required(),
        ]);
    }
}
