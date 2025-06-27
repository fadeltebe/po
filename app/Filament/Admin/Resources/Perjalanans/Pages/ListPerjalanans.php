<?php

namespace App\Filament\Admin\Resources\Perjalanans\Pages;

use App\Filament\Admin\Resources\Perjalanans\PerjalananResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListPerjalanans extends ListRecords
{
    protected static string $resource = PerjalananResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
