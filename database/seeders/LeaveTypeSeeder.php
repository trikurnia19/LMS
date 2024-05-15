<?php

namespace Database\Seeders;

use App\Models\LeaveType;
use Illuminate\Database\Seeder;

class LeaveTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        LeaveType::create([
            'type' => 'Tahunan',
            'days' => 5,
        ]);
        LeaveType::create([
            'type' => 'Pribadi',
            'days' => 5,
        ]);
        LeaveType::create([
            'type' => 'Tanpa upah',
            'days' => 5,
        ]);
        LeaveType::create([
            'type' => 'Cuti panjang',
            'days' => 5,
        ]);
    }
}
