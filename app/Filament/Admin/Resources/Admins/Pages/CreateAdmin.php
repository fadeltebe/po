<?php

namespace App\Filament\Admin\Resources\Admins\Pages;

use App\Models\Agen;
use App\Models\User;
use App\Models\Admin;
use Filament\Facades\Filament;
use Illuminate\Support\Facades\Hash;
use Filament\Resources\Pages\CreateRecord;
use App\Filament\Admin\Resources\Admins\AdminResource;

class CreateAdmin extends CreateRecord
{
    protected static string $resource = AdminResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    protected function handleRecordCreation(array $data): Admin
    {
        $travelId = Filament::getTenant()?->id;

        // 1. Buat User
        $user = User::create([
            'name' => $data['user_name'],
            'email' => $data['user_email'],
            'password' => Hash::make($data['user_password']),
        ]);

        $user->assignRole('admin');

        // 2. Tambah ke travel_user
        $user->travels()->attach($travelId);

        // 3. Buat Agen jika belum ada (jika pakai createOptionForm agen_id)
        if (empty($data['agen_id'])) {
            $agen = Agen::create([
                'nama' => $data['nama'],
                'alamat' => $data['alamat'],
                'nomor_hp' => $data['nomor_hp'],
                'travel_id' => $travelId,
                'status' => 'aktif',
            ]);

            $data['agen_id'] = $agen->id;
        }

        // 4. Buat Admin (nama diambil dari User)
        return Admin::create([
            'user_id' => $user->id,
            'travel_id' => $travelId,
            'agen_id' => $data['agen_id'],
            'nama' => $user->name, // Otomatis dari user
            'nik' => $data['nik'] ?? null,
            'nomor_hp' => $data['nomor_hp'],
            'alamat' => $data['alamat'],
            'status' => $data['status'],
        ]);
    }
}
