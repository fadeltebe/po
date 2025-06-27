<?php

namespace App\Filament\Admin\Resources\Perjalanans;

use App\Filament\Admin\Resources\Perjalanans\Pages\CreatePerjalanan;
use App\Filament\Admin\Resources\Perjalanans\Pages\EditPerjalanan;
use App\Filament\Admin\Resources\Perjalanans\Pages\ListPerjalanans;
use App\Filament\Admin\Resources\Perjalanans\Schemas\PerjalananForm;
use App\Filament\Admin\Resources\Perjalanans\Tables\PerjalanansTable;
use App\Models\Perjalanan;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class PerjalananResource extends Resource
{
    protected static ?string $model = Perjalanan::class;

    protected static ?string $navigationLabel = 'Perjalanan';

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    public static function form(Schema $schema): Schema
    {
        return PerjalananForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return PerjalanansTable::configure($table);
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
            'index' => ListPerjalanans::route('/'),
            'create' => CreatePerjalanan::route('/create'),
            'edit' => EditPerjalanan::route('/{record}/edit'),
        ];
    }
}
