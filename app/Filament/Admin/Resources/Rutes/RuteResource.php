<?php

namespace App\Filament\Admin\Resources\Rutes;

use App\Filament\Admin\Resources\Rutes\Pages\CreateRute;
use App\Filament\Admin\Resources\Rutes\Pages\EditRute;
use App\Filament\Admin\Resources\Rutes\Pages\ListRutes;
use App\Filament\Admin\Resources\Rutes\Schemas\RuteForm;
use App\Filament\Admin\Resources\Rutes\Tables\RutesTable;
use App\Models\Rute;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use UnitEnum;

class RuteResource extends Resource
{
    protected static ?string $model = Rute::class;

    protected static ?string $navigationLabel  = 'Rute';

    protected static string | UnitEnum | null $navigationGroup = 'Pengaturan';

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    public static function form(Schema $schema): Schema
    {
        return RuteForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return RutesTable::configure($table);
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
            'index' => ListRutes::route('/'),
            'create' => CreateRute::route('/create'),
            'edit' => EditRute::route('/{record}/edit'),
        ];
    }
}
