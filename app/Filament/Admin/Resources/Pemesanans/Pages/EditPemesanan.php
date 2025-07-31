<?php

namespace App\Filament\Admin\Resources\Pemesanans\Pages;

use App\Filament\Admin\Resources\Pemesanans\PemesananResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditPemesanan extends EditRecord
{
    protected static string $resource = PemesananResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
