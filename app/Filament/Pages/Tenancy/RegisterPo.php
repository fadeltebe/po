<?php

namespace App\Filament\Pages\Tenancy;

use App\Models\PO;

use Filament\Forms\Components\TextInput;
use Filament\Pages\Tenancy\RegisterTenant;
use Filament\Schemas\Schema;

class RegisterPo extends RegisterTenant
{
    public static function getLabel(): string
    {
        return 'Register Travel';
    }

    public function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name'),
                // ...
            ]);
    }

    protected function handleRegistration(array $data): PO
    {
        $po = PO::create($data);

        $po->members()->attach(auth()->user());

        return $po;
    }
}
