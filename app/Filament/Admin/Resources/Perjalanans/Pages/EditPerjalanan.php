<?php

namespace App\Filament\Admin\Resources\Perjalanans\Pages;

use App\Filament\Admin\Resources\Perjalanans\PerjalananResource;
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
