<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\JobApplier;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DemoUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = User::create([
            'name'     => 'Admin',
            'email'    => 'admin@mail.com',
            'password' => Hash::make('12345'),
        ]);
        $admin->assignRole('admin');

        $payroll = User::create([
            'name'     => 'Payroll',
            'email'    => 'payroll@mail.com',
            'password' => Hash::make('12345'),
        ]);
        $payroll->assignRole('payroll');

        $lineManager = User::create([
            'name'     => 'Staff Manager',
            'email'    => 'staff@mail.com',
            'password' => Hash::make('12345'),
        ]);
        $lineManager->assignRole('line manager');

        $user = User::create([
            'name'     => 'Karyawan',
            'email'    => 'karyawan@mail.com',
            'password' => Hash::make('12345'),
        ]);
        $user->assignRole('executive');

        $pelamar = JobApplier::create([
            'name'     => 'Pelamar',
            'email'    => 'pelamar@mail.com',
            'password' => Hash::make('12345'),
        ]);
        $pelamar->assignRole('pelamar');

        $lolos = JobApplier::create([
            'name'     => 'lolos',
            'email'    => 'lolos@mail.com',
            'password' => Hash::make('12345'),
        ]);
        $lolos->assignRole('lolos');

        $pensiun = user::create([
            'name'     => 'Pensiun',
            'email'    => 'pensiun@mail.com',
            'password' => Hash::make('12345'),
        ]);
        $pensiun->assignRole('pensiun');

        
    }
}
