<?php

namespace App\Filament\Admin\Resources\Perjalanans;

use BackedEnum;
use App\Models\Perjalanan;
use Filament\Tables\Table;
use Filament\Schemas\Schema;
use Filament\Resources\Resource;
use Filament\Support\Icons\Heroicon;
// use Illuminate\Contracts\Database\Query\Builder;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Admin\Resources\Perjalanans\Pages\EditPerjalanan;
use App\Filament\Admin\Resources\Perjalanans\Pages\ListPerjalanans;
use App\Filament\Admin\Resources\Perjalanans\Pages\CreatePerjalanan;
use App\Filament\Admin\Resources\Perjalanans\Schemas\PerjalananForm;
use App\Filament\Admin\Resources\Perjalanans\Tables\PerjalanansTable;

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
            // 'edit' => EditPerjalanan::route('/{record}/edit'),
        ];
    }

    public static function getEloquentQuery(): Builder
    {
        $user = auth()->user();

        if ($user->hasRole('Admin')) {
            $admin = \App\Models\Admin::where('user_id', $user->id)->first();

            return parent::getEloquentQuery()
                ->whereHas(
                    'rute',
                    fn($query) =>
                    $query->where('lokasi_asal_id', $admin->agen_id)
                        ->orWhere('lokasi_tujuan_id', $admin->agen_id)
                );
        }

        return parent::getEloquentQuery();
    }
}
