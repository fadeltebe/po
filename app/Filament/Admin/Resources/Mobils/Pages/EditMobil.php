<?php

namespace App\Filament\Admin\Resources\Mobils\Pages;

use App\Filament\Admin\Resources\Mobils\MobilResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditMobil extends EditRecord
{
    protected static string $resource = MobilResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
