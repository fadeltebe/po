<?php

namespace App\Filament\Admin\Resources\Tikets\Pages;

use App\Filament\Admin\Resources\Tikets\TiketResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListTikets extends ListRecords
{
    protected static string $resource = TiketResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
