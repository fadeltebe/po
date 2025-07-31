<?php

namespace App\Filament\Admin\Resources\Tikets\Pages;

use App\Filament\Admin\Resources\Tikets\TiketResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditTiket extends EditRecord
{
    protected static string $resource = TiketResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
