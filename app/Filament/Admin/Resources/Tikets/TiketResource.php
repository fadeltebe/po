<?php

namespace App\Filament\Admin\Resources\Tikets;

use App\Filament\Admin\Resources\Tikets\Pages\CreateTiket;
use App\Filament\Admin\Resources\Tikets\Pages\EditTiket;
use App\Filament\Admin\Resources\Tikets\Pages\ListTikets;
use App\Filament\Admin\Resources\Tikets\Schemas\TiketForm;
use App\Filament\Admin\Resources\Tikets\Tables\TiketsTable;
use App\Models\Tiket;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class TiketResource extends Resource
{
    protected static ?string $model = Tiket::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    public static function form(Schema $schema): Schema
    {
        return TiketForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return TiketsTable::configure($table);
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
            'index' => ListTikets::route('/'),
            'create' => CreateTiket::route('/create'),
            'edit' => EditTiket::route('/{record}/edit'),
        ];
    }
}
