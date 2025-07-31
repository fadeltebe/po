<?php

namespace App\Filament\Admin\Resources\Penumpangs\Pages;

use App\Filament\Admin\Resources\Penumpangs\PenumpangResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListPenumpangs extends ListRecords
{
    protected static string $resource = PenumpangResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
