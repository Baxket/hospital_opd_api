<?php

namespace Database\Seeders;

use App\Models\StaffType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StaffTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $types = array(
            array('id' => 1, 'name' => 'Doctor', 'created_at' => now()),
            array('id' => 2, 'name' => 'Nurse', 'created_at' => now()),
        );
        StaffType::insert($types);

    }
}
