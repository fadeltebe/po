<?php

namespace App\Filament\Admin\Resources\Mobils;

use App\Filament\Admin\Resources\Mobils\Pages\CreateMobil;
use App\Filament\Admin\Resources\Mobils\Pages\EditMobil;
use App\Filament\Admin\Resources\Mobils\Pages\ListMobils;
use App\Filament\Admin\Resources\Mobils\Schemas\MobilForm;
use App\Filament\Admin\Resources\Mobils\Tables\MobilsTable;
use App\Models\Mobil;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use UnitEnum;

class MobilResource extends Resource
{
    protected static ?string $model = Mobil::class;

    protected static ?string $navigationLabel  = 'Mobil';

    protected static string | UnitEnum | null $navigationGroup = 'Pengaturan';

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    public static function form(Schema $schema): Schema
    {
        return MobilForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return MobilsTable::configure($table);
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
            'index' => ListMobils::route('/'),
            'create' => CreateMobil::route('/create'),
            'edit' => EditMobil::route('/{record}/edit'),
        ];
    }
}
