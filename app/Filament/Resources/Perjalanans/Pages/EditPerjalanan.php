<?php

namespace App\Filament\Resources\Perjalanans\Pages;

use App\Filament\Resources\Perjalanans\PerjalananResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditPerjalanan extends EditRecord
{
    protected static string $resource = PerjalananResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
