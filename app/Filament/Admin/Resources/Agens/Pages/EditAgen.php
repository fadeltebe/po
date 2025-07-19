<?php

namespace App\Filament\Admin\Resources\Agens\Pages;

use App\Filament\Admin\Resources\Agens\AgenResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditAgen extends EditRecord
{
    protected static string $resource = AgenResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
