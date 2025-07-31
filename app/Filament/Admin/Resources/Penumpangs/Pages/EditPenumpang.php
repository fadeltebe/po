<?php

namespace App\Filament\Admin\Resources\Penumpangs\Pages;

use App\Filament\Admin\Resources\Penumpangs\PenumpangResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditPenumpang extends EditRecord
{
    protected static string $resource = PenumpangResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
