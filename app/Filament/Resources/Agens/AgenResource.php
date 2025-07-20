<?php

namespace App\Filament\Resources\Agens;

use App\Filament\Resources\Agens\Pages\CreateAgen;
use App\Filament\Resources\Agens\Pages\EditAgen;
use App\Filament\Resources\Agens\Pages\ListAgens;
use App\Filament\Resources\Agens\Schemas\AgenForm;
use App\Filament\Resources\Agens\Tables\AgensTable;
use App\Models\Agen;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class AgenResource extends Resource
{
    protected static ?string $model = Agen::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    public static function form(Schema $schema): Schema
    {
        return AgenForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return AgensTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListAgens::route('/'),
            'create' => CreateAgen::route('/create'),
            'edit' => EditAgen::route('/{record}/edit'),
        ];
    }
}
