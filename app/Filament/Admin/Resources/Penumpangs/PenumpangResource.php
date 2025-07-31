<?php

namespace App\Filament\Admin\Resources\Penumpangs;

use App\Filament\Admin\Resources\Penumpangs\Pages\CreatePenumpang;
use App\Filament\Admin\Resources\Penumpangs\Pages\EditPenumpang;
use App\Filament\Admin\Resources\Penumpangs\Pages\ListPenumpangs;
use App\Filament\Admin\Resources\Penumpangs\Schemas\PenumpangForm;
use App\Filament\Admin\Resources\Penumpangs\Tables\PenumpangsTable;
use App\Models\Penumpang;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class PenumpangResource extends Resource
{
    protected static ?string $model = Penumpang::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    public static function form(Schema $schema): Schema
    {
        return PenumpangForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return PenumpangsTable::configure($table);
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
            'index' => ListPenumpangs::route('/'),
            'create' => CreatePenumpang::route('/create'),
            'edit' => EditPenumpang::route('/{record}/edit'),
        ];
    }
}
