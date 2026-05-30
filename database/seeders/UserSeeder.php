<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Bidang;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // Super Admin
        User::create([
            'name'      => 'Super Administrator',
            'email'     => 'superadmin@pcimm-sukoharjo.org',
            'password'  => Hash::make('password'),
            'role'      => 'super_admin',
            'bidang_id' => null,
            'is_active' => true,
        ]);

        // Admin per Bidang
        $bidangs = Bidang::all();
        $admins  = [
            ['name' => 'Admin BOK',    'email' => 'admin.bok@pcimm-sukoharjo.org'],
            ['name' => 'Admin RPKKS',  'email' => 'admin.rpkks@pcimm-sukoharjo.org'],
            ['name' => 'Admin TKK',    'email' => 'admin.tkk@pcimm-sukoharjo.org'],
            ['name' => 'Admin SPM',    'email' => 'admin.spm@pcimm-sukoharjo.org'],
            ['name' => 'Admin HPKP',   'email' => 'admin.hpkp@pcimm-sukoharjo.org'],
            ['name' => 'Admin Medkom', 'email' => 'admin.medkom@pcimm-sukoharjo.org'],
        ];

        foreach ($bidangs as $index => $bidang) {
            if (isset($admins[$index])) {
                User::create([
                    'name'      => $admins[$index]['name'],
                    'email'     => $admins[$index]['email'],
                    'password'  => Hash::make('password'),
                    'role'      => 'admin_bidang',
                    'bidang_id' => $bidang->id,
                    'is_active' => true,
                ]);
            }
        }

        $this->command->info('Users seeded successfully.');
        $this->command->line('Super Admin: superadmin@pcimm-sukoharjo.org | password: password');
        $this->command->line('Admin BOK:   admin.bok@pcimm-sukoharjo.org  | password: password');
    }
}
