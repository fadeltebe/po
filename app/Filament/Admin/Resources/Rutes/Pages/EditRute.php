<?php

namespace App\Filament\Admin\Resources\Rutes\Pages;

use App\Filament\Admin\Resources\Rutes\RuteResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditRute extends EditRecord
{
    protected static string $resource = RuteResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
