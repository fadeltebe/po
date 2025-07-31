<?php

namespace App\Filament\Resources\Penumpangs\Pages;

use App\Filament\Resources\Penumpangs\PenumpangResource;
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
